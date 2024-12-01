<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ticket;
use App\Models\Event;
use Illuminate\Support\Str;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tech Conference 2024
        $event = Event::where('event_name', 'Tech Conference 2024')->first();
        Ticket::create([
            'ticket_uuid' => Str::uuid(),
            'jenis_ticket' => 'VIP',
            'ticket_price' => 1500000,
            'jumlah_ticket' => 50,
            'event_id' => $event->event_id,
        ]);
        Ticket::create([
            'ticket_uuid' => Str::uuid(),
            'jenis_ticket' => 'Regular',
            'ticket_price' => 750000,
            'jumlah_ticket' => 200,
            'event_id' => $event->event_id,
        ]);

        // Startup Weekend 2024
        $event = Event::where('event_name', 'Startup Weekend 2024')->first();
        Ticket::create([
            'ticket_uuid' => Str::uuid(),
            'jenis_ticket' => 'VIP',
            'ticket_price' => 1000000,
            'jumlah_ticket' => 30,
            'event_id' => $event->event_id,
        ]);
        Ticket::create([
            'ticket_uuid' => Str::uuid(),
            'jenis_ticket' => 'Regular',
            'ticket_price' => 500000,
            'jumlah_ticket' => 150,
            'event_id' => $event->event_id,
        ]);

        // Business Summit 2024
        $event = Event::where('event_name', 'Business Summit 2024')->first();
        Ticket::create([
            'ticket_uuid' => Str::uuid(),
            'jenis_ticket' => 'VIP',
            'ticket_price' => 2000000,
            'jumlah_ticket' => 40,
            'event_id' => $event->event_id,
        ]);
        Ticket::create([
            'ticket_uuid' => Str::uuid(),
            'jenis_ticket' => 'Regular',
            'ticket_price' => 1000000,
            'jumlah_ticket' => 160,
            'event_id' => $event->event_id,
        ]);

        // Music Festival 2024
        $event = Event::where('event_name', 'Music Festival 2024')->first();
        Ticket::create([
            'ticket_uuid' => Str::uuid(),
            'jenis_ticket' => 'VIP',
            'ticket_price' => 2000000,
            'jumlah_ticket' => 100,
            'event_id' => $event->event_id,
        ]);
        Ticket::create([
            'ticket_uuid' => Str::uuid(),
            'jenis_ticket' => 'General',
            'ticket_price' => 500000,
            'jumlah_ticket' => 500,
            'event_id' => $event->event_id,
        ]);

        // Art Exhibition 2024
        $event = Event::where('event_name', 'Art Exhibition 2024')->first();
        Ticket::create([
            'ticket_uuid' => Str::uuid(),
            'jenis_ticket' => 'VIP',
            'ticket_price' => 1000000,
            'jumlah_ticket' => 20,
            'event_id' => $event->event_id,
        ]);
        Ticket::create([
            'ticket_uuid' => Str::uuid(),
            'jenis_ticket' => 'Regular',
            'ticket_price' => 400000,
            'jumlah_ticket' => 180,
            'event_id' => $event->event_id,
        ]);

        // Digital Marketing Summit 2024
        $event = Event::where('event_name', 'Digital Marketing Summit 2024')->first();
        Ticket::create([
            'ticket_uuid' => Str::uuid(),
            'jenis_ticket' => 'VIP',
            'ticket_price' => 1200000,
            'jumlah_ticket' => 60,
            'event_id' => $event->event_id,
        ]);
        Ticket::create([
            'ticket_uuid' => Str::uuid(),
            'jenis_ticket' => 'Regular',
            'ticket_price' => 600000,
            'jumlah_ticket' => 300,
            'event_id' => $event->event_id,
        ]);

        // Blockchain Expo 2024
        $event = Event::where('event_name', 'Blockchain Expo 2024')->first();
        Ticket::create([
            'ticket_uuid' => Str::uuid(),
            'jenis_ticket' => 'VIP',
            'ticket_price' => 2500000,
            'jumlah_ticket' => 80,
            'event_id' => $event->event_id,
        ]);
        Ticket::create([
            'ticket_uuid' => Str::uuid(),
            'jenis_ticket' => 'Regular',
            'ticket_price' => 1200000,
            'jumlah_ticket' => 400,
            'event_id' => $event->event_id,
        ]);

        // Fashion Show 2024
        $event = Event::where('event_name', 'Fashion Show 2024')->first();
        Ticket::create([
            'ticket_uuid' => Str::uuid(),
            'jenis_ticket' => 'VIP',
            'ticket_price' => 1800000,
            'jumlah_ticket' => 60,
            'event_id' => $event->event_id,
        ]);
        Ticket::create([
            'ticket_uuid' => Str::uuid(),
            'jenis_ticket' => 'Regular',
            'ticket_price' => 900000,
            'jumlah_ticket' => 300,
            'event_id' => $event->event_id,
        ]);

        // Sports Championship 2024
        $event = Event::where('event_name', 'Sports Championship 2024')->first();
        Ticket::create([
            'ticket_uuid' => Str::uuid(),
            'jenis_ticket' => 'VIP',
            'ticket_price' => 2500000,
            'jumlah_ticket' => 100,
            'event_id' => $event->event_id,
        ]);
        Ticket::create([
            'ticket_uuid' => Str::uuid(),
            'jenis_ticket' => 'General',
            'ticket_price' => 800000,
            'jumlah_ticket' => 1000,
            'event_id' => $event->event_id,
        ]);

        // Food Expo 2024
        $event = Event::where('event_name', 'Food Expo 2024')->first();
        Ticket::create([
            'ticket_uuid' => Str::uuid(),
            'jenis_ticket' => 'VIP',
            'ticket_price' => 1200000,
            'jumlah_ticket' => 100,
            'event_id' => $event->event_id,
        ]);
        Ticket::create([
            'ticket_uuid' => Str::uuid(),
            'jenis_ticket' => 'General',
            'ticket_price' => 500000,
            'jumlah_ticket' => 700,
            'event_id' => $event->event_id,
        ]);
    }
}
