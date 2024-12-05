<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Ticket;
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

    public function createCharge(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'data' => 'required|array',
            ]);

            // return response()->json($validatedData['data']);

            $items = [];
            $price = 0;
            foreach ($validatedData['data'] as $data) {
                if ($ticket = Ticket::with('events')->where('ticket_uuid', $data['tickets'])->first()) {
                    // Pastikan bahwa harga tiket dan kuantitas valid
                    $ticketPrice = is_numeric($ticket['ticket_price']) ? (float)$ticket['ticket_price'] : 0;
                    $quantity = is_numeric($data['qty']) ? (int)$data['qty'] : 0;

                    $items[] = [
                        'id' => $ticket['ticket_uuid'],
                        'name' => "Tiket " . $ticket->events->event_name . ": " . $ticket['jenis_ticket'],
                        'price' => $ticket['ticket_price'],  // menggunakan harga asli
                        'quantity' => $data['qty'],
                    ];

                    // Kalkulasi total dengan memastikan kedua nilai numerik
                    $total = $quantity * $ticketPrice;
                    $price = $price + $total;
                } else {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Tiket dengan UUID ' . $data['tickets'] . 'tidak ditemukan.'
                    ]);
                }
            }

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
                'message' => $snapToken
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->errors()
            ]);
        };
    }
}
