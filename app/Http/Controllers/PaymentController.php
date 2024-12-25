<?php

namespace App\Http\Controllers;

use App\Events\PaymentUpdate;
use Carbon\Carbon;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Event;
use App\Models\Queue;
use App\Models\Ticket;
use App\Models\Booking;
use App\Models\Payment;
use Midtrans\Transaction;
use App\Events\QueueUpdated;
use Illuminate\Http\Request;
use App\Events\TicketUpdated;
use App\Models\Booking_Detail;
use App\Mail\Ticket as MailTicket;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class PaymentController extends Controller
{

    private $addTime;
    private $queue;
    public function __construct()
    {
        $this->queue = new QueueController();
        $this->addTime = ceil(env('WAR_TICKET_DURATION', 60) / 60);
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    public function createCharge(Event $event, Request $request)
    {
        try {
            $event->load('tickets');

            $validatedData = $request->validate([
                'data' => 'required|array',
            ]);

            $items = [];
            $price = 0;

            // save
            $booking = $this->saveBooking($request, $event);

            foreach ($validatedData['data'] as $data) {
                $ticket = $event->tickets->firstWhere('uuid', $data['tickets']);
                if ($ticket) {
                    if (!$ticket->is_empty && $data['qty'] <= $ticket->qty_available && $data['qty'] <= 10) {
                        // Pastikan bahwa harga tiket dan kuantitas valid
                        $ticketPrice = is_numeric($ticket['price']) ? (float)$ticket['price'] : 0;
                        $quantity = is_numeric($data['qty']) ? (int)$data['qty'] : 0;

                        $items[] = [
                            'id' => $ticket['uuid'],
                            'name' => "Tiket " . $event->name . ": " . $ticket->ticket,
                            'price' => $ticket['price'],  // menggunakan harga asli
                            'quantity' => $data['qty'],
                        ];

                        // Kalkulasi total dengan memastikan kedua nilai numerik
                        $total = $quantity * $ticketPrice;
                        $price = $price + $total;
                        $bookingDetails = $this->saveBookingDetail($data, $booking, $ticket, $price);
                        broadcast(new TicketUpdated($ticket));
                    } elseif ($data['qty'] > $ticket->qty_available || $data['qty'] >= 10) {
                        return response()->json([
                            'status' => 'error',
                            'message' => "Tiket " . $event->name . ": " . $ticket->ticket . " melebihi stok"
                        ]);
                    } else {
                        return response()->json([
                            'status' => 'error',
                            'message' => "Tiket " . $event->name . ": " . $ticket->ticket . " telah habis "
                        ]);
                    }
                } else {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Tiket dengan UUID ' . $data['tickets'] . 'tidak ditemukan.'
                    ]);
                }
            }

            // CREATE PAYMENTS
            $payment = Payment::create([
                'booking_uuid' => $booking->uuid,
                'total' => $price,
                'payment_status' => 'pending',
            ]);

            $params = [
                'transaction_details' => [
                    'order_id' => $payment->uuid,
                    'gross_amount' => $price,
                ],
                'item_details' => $items,
                'customer_details' => [
                    'uuid' => Auth::user()->uuid,
                    'fullname' => Auth::user()->fullname,
                    'email' => Auth::user()->email,
                ],
            ];

            $snapToken = Snap::getSnapToken($params);
            return response()->json([
                'status' => 'success',
                'message' => [
                    'token' => $snapToken,
                    'booking_uuid' => $booking->uuid
                ]
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->errors()
            ]);
        };
    }

    private function saveBooking($request, $event)
    {
        $request = [
            'user_uuid' => Auth::user()->uuid,
            'event_uuid' => $event->uuid,
            'booking_date' => now()->toDateTimeString(),
        ];
        return Booking::create($request);
    }

    private function saveBookingDetail($request, $booking, $ticket, $price)
    {
        $request = [
            'booking_uuid' => $booking->uuid,
            'ticket_uuid' => $ticket->uuid,
            'qty' => $request['qty'],
            'total' => $price,
        ];

        return Booking_Detail::create($request);
    }

    public function createPay(Event $event, Request $request)
    {
        try {
            $validatedData = $request->validate([
                'data' => 'required|array',
                'booking_uuid' => 'required|exists:payments,booking_uuid'
            ]);

            $payment = Payment::where('booking_uuid', $validatedData['booking_uuid'])->first();
            if ($validatedData['data']['payment_type'] == 'qris') {
                $validatedData['data']['va_numbers'][0]['va_number'] = "https://api.sandbox.midtrans.com/v2/qris/" . $validatedData['data']['transaction_id'] . "/qr-code";
            }
            $payment->update([
                'status' => $validatedData['data']['transaction_status'],
                'method' => $validatedData['data']['payment_type'],
                'payment_date' => $validatedData['data']['transaction_time'],
                'bank' => $validatedData['data']['va_numbers'][0]['bank'] ?? null,
                'va' => $validatedData['data']['va_numbers'][0]['va_number'] ?? null,
            ]);

            Booking::where('uuid', $validatedData['booking_uuid'])->update([
                'status' => $validatedData['data']['transaction_status']
            ]);

            return response()->json([
                'status' => 'success',
                'message' => $payment
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->errors()
            ]);
        };
    }



    public function showTransaction(Payment $payment)
    {
        $payment->load(['booking', 'booking.event', 'booking.bookingDetail', 'booking.bookingDetail.ticket']);

        if (!Gate::allows('isMyTransaction', $payment)) {
            return abort(403);
        }
        // Pastikan tenggatWaktu adalah instance Carbon
        $tenggatWaktu = Carbon::parse($payment->tenggatWaktu)->timestamp;
        if (now()->timestamp >= $tenggatWaktu) {
            if ($payment->status === 'pending') {
                Transaction::cancel($payment->uuid);
                $payment->update([
                    'status' => 'failed'
                ]);
                $payment->booking->update([
                    'status' => 'failed'
                ]);
            }
        } else {
            if ($payment->status === 'settlement') {
                $payment->update([
                    'status' => 'settlement'
                ]);
                $payment->booking->update([
                    'status' => 'settlement'
                ]);
            }
        }

        if ($payment->booking->event->is_tiket_war) {
            if ($payment->status !== 'pending') {
                $qid = Queue::where('user_uuid', Auth::user()->uuid)->where('event_uuid', $payment->booking->event->uuid)->where('status', '!=', 'completed')->first();
                if ($qid) {
                    $this->queue->completeQueue($qid->uuid, $payment->booking->event->uuid);
                    foreach ($payment->booking->bookingDetail as $ticket) {
                        broadcast(new TicketUpdated(Ticket::where('uuid', $ticket->ticket_uuid)->first()));
                    }
                }
            }

            if ($payment->status === 'settlement' && $payment->booking->sendEmail == false) {
                $ticket =  new TicketController();
                $ticket->generate($payment);
                Booking::where('uuid', $payment->booking->uuid)->update([
                    'sendEmail' => true,
                ]);
                $ticket = $payment;
                Mail::to($payment->booking->user->email)->send(new MailTicket($ticket));
            }
        }

        $payment->load(['booking', 'booking.event']);
        $data = [
            'title' => 'Transaction Ticket: ' . $payment->booking->event->name,
            'payment' => $payment,
        ];
        return view('main.transaction', $data);
    }


    public function testSelesai(Payment $payment)
    {
        $payment->load(['booking', 'booking.event']);
        $qid = Queue::where('user_uuid', Auth::user()->uuid)->where('event_uuid', $payment->booking->event->uuid)->first();

        $this->queue->completeQueue($qid->uuid, $payment->booking->event->uuid);
    }



    public function callbackMidtrans()
    {

        $notif = new \Midtrans\Notification();


        $transaction = $notif->transaction_status;
        $fraud = $notif->fraud_status;

        error_log("Order ID $notif->order_id: " . "transaction status = $transaction, fraud staus = $fraud");

        $order = Payment::where('uuid', $notif->order_id)->first();
        $booking = Booking::where('uuid',  $order->booking_uuid)->first();
        if ($transaction == 'pending') {
            $order->update([
                'status' => 'pending'
            ]);
            $booking->update([
                'status' => 'pending'
            ]);
        } elseif ($transaction == 'settlement') {
            $order->update([
                'status' => 'settlement'
            ]);
            $booking->update([
                'status' => 'settlement'
            ]);
        } elseif ($transaction == 'cancel' || $transaction == 'failed') {
            $order->update([
                'status' => 'failed'
            ]);
            $booking->update([
                'status' => 'failed'
            ]);
        }

        broadcast(new PaymentUpdate($notif->order_id));

        return response()->json(['status' => 'success', 'data' => $notif->order_id]);
    }
}
