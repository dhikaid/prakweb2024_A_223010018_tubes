<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Event::create([
            'event_uuid' => Str::uuid(),
            'event_name' => 'Tech Conference 2024',
            'image' => 'tech_conference.jpg',
            'description' => 'A conference about the latest in tech, focusing on AI, Cloud, and IoT.',
            'location' => 'Jakarta Convention Center',
            'start_date' => '2024-12-01 09:00:00',
            'end_date' => '2024-12-01 17:00:00',
            'capacity' => 500,
            'is_tiket_war' => true,
            'queue_limit' => 50,
        ]);

        Event::create([
            'event_uuid' => Str::uuid(),
            'event_name' => 'Startup Weekend 2024',
            'image' => 'startup_weekend.jpg',
            'description' => 'A weekend event for aspiring entrepreneurs to network, learn, and pitch their ideas.',
            'location' => 'Bandung Tech Park',
            'start_date' => '2024-12-10 10:00:00',
            'end_date' => '2024-12-12 18:00:00',
            'capacity' => 300,
            'is_tiket_war' => false,
            'queue_limit' => null,
        ]);

        Event::create([
            'event_uuid' => Str::uuid(),
            'event_name' => 'Business Summit 2024',
            'image' => 'business_summit.jpg',
            'description' => 'An annual summit for business leaders and innovators to share insights on global markets.',
            'location' => 'Grand Ballroom, Jakarta',
            'start_date' => '2024-12-15 08:00:00',
            'end_date' => '2024-12-15 18:00:00',
            'capacity' => 400,
            'is_tiket_war' => true,
            'queue_limit' => 30,
        ]);

        Event::create([
            'event_uuid' => Str::uuid(),
            'event_name' => 'Music Festival 2024',
            'image' => 'music_festival.jpg',
            'description' => 'An exciting music festival featuring international and local bands and performers.',
            'location' => 'Bali Beach',
            'start_date' => '2024-12-20 15:00:00',
            'end_date' => '2024-12-20 23:59:00',
            'capacity' => 1000,
            'is_tiket_war' => true,
            'queue_limit' => 100,
        ]);

        Event::create([
            'event_uuid' => Str::uuid(),
            'event_name' => 'Art Exhibition 2024',
            'image' => 'art_exhibition.jpg',
            'description' => 'A prestigious art exhibition showcasing modern art from both emerging and renowned artists.',
            'location' => 'Museum of Art, Yogyakarta',
            'start_date' => '2024-12-25 10:00:00',
            'end_date' => '2024-12-25 18:00:00',
            'capacity' => 200,
            'is_tiket_war' => false,
            'queue_limit' => null,
        ]);


        Event::create([
            'event_uuid' => Str::uuid(),
            'event_name' => 'Digital Marketing Summit 2024',
            'image' => 'digital_marketing.jpg',
            'description' => 'A summit that brings together experts to discuss the latest trends in digital marketing.',
            'location' => 'Surabaya Convention Center',
            'start_date' => '2024-12-28 09:00:00',
            'end_date' => '2024-12-28 17:00:00',
            'capacity' => 350,
            'is_tiket_war' => true,
            'queue_limit' => 20,
        ]);


        Event::create([
            'event_uuid' => Str::uuid(),
            'event_name' => 'Blockchain Expo 2024',
            'image' => 'blockchain_expo.jpg',
            'description' => 'A global event showcasing the latest blockchain technologies and trends.',
            'location' => 'Jakarta Convention Center',
            'start_date' => '2024-12-29 10:00:00',
            'end_date' => '2024-12-29 18:00:00',
            'capacity' => 600,
            'is_tiket_war' => true,
            'queue_limit' => 50,
        ]);


        Event::create([
            'event_uuid' => Str::uuid(),
            'event_name' => 'Fashion Show 2024',
            'image' => 'fashion_show.jpg',
            'description' => 'An annual event showcasing the latest fashion trends and designers.',
            'location' => 'Bali Fashion Mall',
            'start_date' => '2024-12-30 19:00:00',
            'end_date' => '2024-12-30 23:00:00',
            'capacity' => 500,
            'is_tiket_war' => false,
            'queue_limit' => null,
        ]);


        Event::create([
            'event_uuid' => Str::uuid(),
            'event_name' => 'Sports Championship 2024',
            'image' => 'sports_championship.jpg',
            'description' => 'An exciting sports event with national and international athletes competing.',
            'location' => 'National Stadium, Jakarta',
            'start_date' => '2024-12-18 10:00:00',
            'end_date' => '2024-12-18 20:00:00',
            'capacity' => 2000,
            'is_tiket_war' => true,
            'queue_limit' => 200,
        ]);


        Event::create([
            'event_uuid' => Str::uuid(),
            'event_name' => 'Food Expo 2024',
            'image' => 'music_expo.jpg',
            'description' => 'A music expo featuring top singers, local band performance, and music vendors.',
            'location' => 'Jakarta International Expo',
            'start_date' => '2024-12-22 11:00:00',
            'end_date' => '2024-12-22 19:00:00',
            'capacity' => 800,
            'is_tiket_war' => false,
            'queue_limit' => null,
        ]);

    }
}
