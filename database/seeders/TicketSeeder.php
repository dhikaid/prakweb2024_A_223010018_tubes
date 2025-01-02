<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ticket;
use App\Models\Event;
use App\Models\Scopes\ActiveScope;
use Illuminate\Support\Str;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tech Conference 2024
        $event = Event::withoutGlobalScope(ActiveScope::class)->where('name', 'Stand Up Comedy by Rafli')->first();
        Ticket::create([
            'ticket' => 'Bangku Depan',
            'price' => 1500000,
            'qty' => 3,
            'event_uuid' => $event->uuid,
        ]);
        Ticket::create([
            'ticket' => 'Bangku Tengah',
            'price' => 750000,
            'qty' => 2,
            'event_uuid' => $event->uuid,
        ]);

        $events = Event::withoutGlobalScope(ActiveScope::class)
            ->where('name', '!=', 'Stand Up Comedy by Rafli')
            ->get();

        foreach ($events as $event) {
            Ticket::create([
                'ticket' => 'VIP',
                'price' => random_int(500, 2000) * 1000, // Kelipatan 1000
                'qty' => random_int(10, 100),
                'event_uuid' => $event->uuid,
            ]);
            Ticket::create([
                'ticket' => 'Regular',
                'price' => random_int(50, 300) * 1000, // Kelipatan 1000
                'qty' => random_int(10, 100),
                'event_uuid' => $event->uuid,
            ]);
        }
    }
}
