<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Queue;
use App\Events\QueueUpdated;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\LaravelPdf\Facades\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class QueueController extends Controller
{
    public function showQueue(Event $event)
    {

        $userUuid = Auth::user()->uuid;
        $queue = Queue::where('event_uuid', $event->uuid)
            ->where('user_uuid', $userUuid)->where('status', '!=', 'completed')
            ->first();

        if (!$queue) {
            return redirect()->to("/event/$event->slug");
        }

        $event->load(['queue']);

        // Jika status antrean selesai, arahkan ke halaman tiket

        if ($queue->status === 'pending') {
            if ($event->queue->where('status', 'in_progress')->count() < $event->queue_limit) {

                // redirect method post
                return redirect()->to("/event/{$event->slug}/start");
            }
        }

        $total_queue = Queue::where('event_uuid', $event->uuid)->where('status', 'pending')->count();
        // Tampilkan halaman tunggu antrian
        $data = [
            'title' => 'War Ticket: ' . $event->name,
            'event' => $event,
            'queue' => $this->getQueuePosition($event->uuid, $userUuid),
            'time' => $this->getQueueEstimate($event->uuid, $userUuid),
            'total_queue' => $total_queue,
            'qid' => $queue->uuid,
            'tickets' => Ticket::where('event_uuid', $event->uuid)->get()
        ];

        return view('main.queue', $data);
    }



    public function showWar(Event $event)
    {

        $data = [
            'title' => 'War Ticket: ' . $event->name,
            'event' => $event,
        ];
        return view('main.war', $data);
    }

    function getQueuePosition($eventUuid, $userUuid)
    {
        $currentQueue = Queue::where('event_uuid', $eventUuid)
            ->where('user_uuid', $userUuid)->where('status', '!=', 'completed')
            ->first();

        if (!$currentQueue) {
            return null; // Jika pengguna tidak ada dalam antrian
        }

        $position = Queue::where('event_uuid', $eventUuid)
            ->where('status', 'pending')
            ->where('time', '<', $currentQueue->time)
            ->count();

        return $position + 1; // Posisi antrian dimulai dari 1
    }

    function getQueueEstimate($eventUuid, $userUuid)
    {
        $position = $this->getQueuePosition($eventUuid, $userUuid);

        if ($position === null) {
            return null; // Jika pengguna tidak ada dalam antrian
        }

        $estimatedMinutesPerUser = 2; // Waktu estimasi per pengguna
        return $position * $estimatedMinutesPerUser;
    }



    public function postWar(Event $event)
    {
        if (!$event->is_tiket_war) {
            return redirect()->to("/event/$event->slug");
        }

        // Tambahkan pengguna baru ke antrian dengan status pending
        $data = [
            'event_uuid' => $event->uuid,
            'user_uuid' => Auth::user()->uuid,
            'time' => now(),
            'status' => 'pending',
        ];
        if (!Queue::where('event_uuid', $event->uuid)
            ->where('user_uuid', Auth::user()->uuid)->where('status', '!=', 'completed')->first()) {
            Queue::create($data);
        }
        // Kirim pembaruan posisi antrian secara real-time
        $this->sendQueueUpdate($event->uuid, Auth::user()->uuid);
        // Arahkan pengguna ke halaman tunggu antrean

        return redirect()->route('queue', ['event' => $event->slug]);
    }



    public function completeQueue($queueUuid, $eventUuid)
    {
        // Tandai pengguna sebagai selesai
        $queue = Queue::where('uuid', $queueUuid)->first();
        if ($queue) {
            $queue->update(['status' => 'completed']);
        }

        // Setelah selesai, proses pengguna berikutnya
        $this->processQueue($eventUuid);
    }

    public function processQueue($queueUuid)
    {
        $queue = Queue::where('uuid', $queueUuid)->first();

        if ($queue) {
            // Tandai pengguna saat ini sebagai 'completed'
            $queue->update(['status' => 'completed']);
        }

        // Ambil event_uuid dari queue saat ini
        $eventUuid = $queue->event_uuid;

        // Cek jumlah pengguna dengan status 'in_progress'
        $currentInProgress = Queue::where('event_uuid', $eventUuid)
            ->where('status', 'in_progress')
            ->count();

        // Ambil queue_limit dari Event
        $queueLimit = Event::where('uuid', $eventUuid)->value('queue_limit');

        // Hitung jumlah slot yang tersedia
        $slotsAvailable = $queueLimit - $currentInProgress;

        // Proses pengguna berikutnya jika ada slot kosong
        for ($i = 0; $i < $slotsAvailable; $i++) {
            $nextQueue = $this->getNextInQueue($eventUuid);
            if ($nextQueue) {
                $nextQueue->update(['status' => 'in_progress']);

                // Broadcast ke pengguna baru
                broadcast(new QueueUpdated(
                    $nextQueue->event_uuid,
                    $nextQueue->user_uuid,
                    1, // Posisi baru
                    2, // Estimasi waktu
                    'in_progress'
                ));
            } else {
                break; // Jika tidak ada antrian lagi, hentikan loop
            }
        }

        // Kirim pembaruan posisi untuk semua pengguna yang masih pending
        $this->sendQueueUpdate($eventUuid);
    }


    public function sendQueueUpdate($eventUuid)
    {
        // Ambil semua antrian dengan status 'pending' berdasarkan waktu
        $queues = Queue::where('event_uuid', $eventUuid)
            ->where('status', 'pending')
            ->orderBy('time', 'asc')
            ->get();

        $estimatedMinutesPerUser = 2; // Estimasi waktu per pengguna

        // Loop melalui setiap pengguna dalam antrian
        foreach ($queues as $index => $queue) {
            $position = $index + 1; // Posisi dimulai dari 1
            $estimate = $position * $estimatedMinutesPerUser;

            // Kirim pembaruan ke setiap pengguna
            broadcast(new QueueUpdated(
                $eventUuid,
                $queue->user_uuid,
                $position,
                $estimate,
                $queue->status // Kirim status saat ini
            ));
        }
    }



    public function checkAndProcessQueue($eventUuid)
    {
        // Cek apakah ada status 'pending' yang belum terisi
        $nextQueue = $this->getNextInQueue($eventUuid);
        if ($nextQueue) {
            // Perbarui status antrian yang telah selesai dan alihkan posisi antrean ke pengguna berikutnya
            $this->processQueue($nextQueue->uuid);
        }
    }

    function getNextInQueue($eventUuid)
    {
        // Ambil pengguna yang belum diproses (statusnya pending)
        return Queue::where('event_uuid', $eventUuid)
            ->where('status', 'pending')
            ->orderBy('time', 'asc')
            ->first();
    }

    public function startWar(Event $event)
    {
        // Memuat relasi queue
        $event->load(['queue']);

        // Hitung jumlah antrian yang sedang 'in_progress'
        $inProgressCount = $event->queue->where('status', 'in_progress')->count();


        // Periksa apakah jumlah antrian yang sedang 'in_progress' kurang dari atau sama dengan batas
        if ($inProgressCount < $event->queue_limit) {
            // Mulai transaksi untuk memastikan atomisitas
            DB::transaction(function () use ($event) {
                // Update status antrian menjadi 'in_progress'

                Queue::where('event_uuid', $event->uuid)
                    ->where('user_uuid', Auth::user()->uuid)
                    ->update(['status' => 'in_progress']);
            });

            // Arahkan pengguna ke halaman tiket
            return redirect()->route('ticket', ['event' => $event->slug]);
        }

        // Jika batas antrian terlampaui, kembali ke halaman sebelumnya
        return back()->with('error', 'Batas antrian telah terlampaui.');
    }

    public function completeQueueOnClose($queueUuid)
    {
        $queue = Queue::where('uuid', $queueUuid)->first();
        if ($queue) {
            // Perbarui status menjadi 'completed'
            $queue->update(['status' => 'completed']);
        }

        // Setelah selesai, kirim pembaruan
        $this->sendQueueUpdate($queue->event_uuid);

        return response()->json(['message' => 'Queue status updated to completed']);
    }
}
