<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Payment;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TicketController extends Controller
{
    public function index(Payment $payment)
    {
        // Filter Payment berdasarkan UUID dan status
        $payment = Payment::where('uuid', $payment->uuid)
            ->with(['booking', 'booking.bookingDetail', 'booking.bookingDetail.ticket', 'booking.event'])
            ->where('status', 'settlement')
            ->first();

        if (!$payment || !$payment->booking) {
            return redirect()->route('home')->with('error', 'Ticket not found.');
        }

        if ($payment->booking->user->uuid !== Auth::user()->uuid) {
            return abort(403);
        }

        // Panggil fungsi generate untuk membuat PDF
        $filePath = $this->generate($payment);

        // Return download response untuk file PDF
        return response()->download($filePath);
    }



    public function generate(Payment $payment)
    {
        // Tentukan path file PDF yang ingin disimpan
        $path = 'tickets/ticket_' . $payment->uuid . '.pdf';
        // Periksa apakah file sudah ada di dalam storage
        if (file_exists(storage_path('app/public/' . $path))) {
            // Jika file sudah ada, kembalikan path-nya
            return storage_path('app/public/' . $path);
        }

        // Membuat PDF dari view 'test' dan data ticket
        $pdf = PDF::loadView('test', ['ticket' => $payment])
            ->setOptions([
                'isRemoteEnabled' => true,          // Mengizinkan pemuatan gambar eksternal
                'isHtml5ParserEnabled' => true,     // Mengaktifkan parsing HTML5
                'isPhpEnabled' => false,            // Menonaktifkan eksekusi PHP dalam HTML
                'isHtml5MediaEnabled' => true,      // Mengaktifkan media HTML5 (audio/video)
                'imageDPI' => 150,                  // Mengatur DPI untuk gambar
                'orientation' => 'portrait',        // Menetapkan orientasi potret
            ]);

        // Menyimpan PDF ke storage public
        $pdf->save(storage_path('app/public/' . $path));

        // Mengembalikan path file PDF yang telah dibuat
        return storage_path('app/public/' . $path);
    }
}
