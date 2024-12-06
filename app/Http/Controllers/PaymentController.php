<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Event;
use App\Models\Ticket;
use App\Models\Booking;
use App\Models\Booking_Detail;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class PaymentController extends Controller
{
    public function __construct()
    {
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
                if ($ticket = $event->tickets->firstWhere('uuid', $data['tickets'])) {
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
                } else {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Tiket dengan UUID ' . $data['tickets'] . 'tidak ditemukan.'
                    ]);
                }
            }

            // CREATE PAYMENTS
            Payment::create([
                'booking_uuid' => $booking->uuid,
                'total' => $price,
                'payment_status' => 'pending',
            ]);

            $params = [
                'transaction_details' => [
                    'order_id' => uniqid(),
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
            $payment->update([
                'status' => $validatedData['data']['transaction_status'],
                'method' => $validatedData['data']['payment_type'],
                'payment_date' => $validatedData['data']['transaction_time'],
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
}
