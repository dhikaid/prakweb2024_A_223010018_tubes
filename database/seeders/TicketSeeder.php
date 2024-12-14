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
        $event = Event::where('name', 'Roasting by Rafli')->first();
        Ticket::create([

            'ticket' => 'VIP',
            'price' => 1500000,
            'qty' => 50,
            'event_uuid' => $event->uuid,
        ]);
        Ticket::create([
            'ticket' => 'Regular',
            'price' => 750000,
            'qty' => 200,
            'event_uuid' => $event->uuid,
        ]);

        // Startup Weekend 2024
        $event = Event::where('name', 'Startup Weekend 2024')->first();
        Ticket::create([

            'ticket' => 'VIP',
            'price' => 1000000,
            'qty' => 30,
            'event_uuid' => $event->uuid,
        ]);
        Ticket::create([

            'ticket' => 'Regular',
            'price' => 500000,
            'qty' => 150,
            'event_uuid' => $event->uuid,
        ]);

        // Business Summit 2024
        $event = Event::where('name', 'Business Summit 2024')->first();
        Ticket::create([

            'ticket' => 'VIP',
            'price' => 2000000,
            'qty' => 40,
            'event_uuid' => $event->uuid,
        ]);
        Ticket::create([

            'ticket' => 'Regular',
            'price' => 1000000,
            'qty' => 160,
            'event_uuid' => $event->uuid,
        ]);

        // Music Festival 2024
        $event = Event::where('name', 'Music Festival 2024')->first();
        Ticket::create([

            'ticket' => 'VIP',
            'price' => 2000000,
            'qty' => 100,
            'event_uuid' => $event->uuid,
        ]);
        Ticket::create([

            'ticket' => 'General',
            'price' => 500000,
            'qty' => 500,
            'event_uuid' => $event->uuid,
        ]);

        // Art Exhibition 2024
        $event = Event::where('name', 'Art Exhibition 2024')->first();
        Ticket::create([

            'ticket' => 'VIP',
            'price' => 1000000,
            'qty' => 20,
            'event_uuid' => $event->uuid,
        ]);
        Ticket::create([

            'ticket' => 'Regular',
            'price' => 400000,
            'qty' => 180,
            'event_uuid' => $event->uuid,
        ]);

        // Digital Marketing Summit 2024
        $event = Event::where('name', 'Digital Marketing Summit 2024')->first();
        Ticket::create([

            'ticket' => 'VIP',
            'price' => 1200000,
            'qty' => 60,
            'event_uuid' => $event->uuid,
        ]);
        Ticket::create([

            'ticket' => 'Regular',
            'price' => 600000,
            'qty' => 300,
            'event_uuid' => $event->uuid,
        ]);

        // Blockchain Expo 2024
        $event = Event::where('name', 'Blockchain Expo 2024')->first();
        Ticket::create([

            'ticket' => 'VIP',
            'price' => 2500000,
            'qty' => 80,
            'event_uuid' => $event->uuid,
        ]);
        Ticket::create([

            'ticket' => 'Regular',
            'price' => 1200000,
            'qty' => 400,
            'event_uuid' => $event->uuid,
        ]);

        // Fashion Show 2024
        $event = Event::where('name', 'Fashion Show 2024')->first();
        Ticket::create([

            'ticket' => 'VIP',
            'price' => 1800000,
            'qty' => 60,
            'event_uuid' => $event->uuid,
        ]);
        Ticket::create([

            'ticket' => 'Regular',
            'price' => 900000,
            'qty' => 300,
            'event_uuid' => $event->uuid,
        ]);

        // Sports Championship 2024
        $event = Event::where('name', 'Sports Championship 2024')->first();
        Ticket::create([

            'ticket' => 'VIP',
            'price' => 2500000,
            'qty' => 100,
            'event_uuid' => $event->uuid,
        ]);
        Ticket::create([

            'ticket' => 'General',
            'price' => 800000,
            'qty' => 1000,
            'event_uuid' => $event->uuid,
        ]);

        // Food Expo 2024
        $event = Event::where('name', 'Food Expo 2024')->first();
        Ticket::create([

            'ticket' => 'VIP',
            'price' => 1200000,
            'qty' => 100,
            'event_uuid' => $event->uuid,
        ]);
        Ticket::create([

            'ticket' => 'General',
            'price' => 500000,
            'qty' => 700,
            'event_uuid' => $event->uuid,
        ]);
    }
}
