<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Category;
use App\Models\Location;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::factory(10)->create();

        Event::create([
            'slug' => 'roasting-by-rafli',
            'user_uuid' => User::inRandomOrder()->first()->uuid,
            'category_uuid' => Category::inRandomOrder()->first()->uuid,
            'name' => 'Roasting by Rafli',
            'image' => 'tech_conference.jpg',
            'description' => 'Bosan dengan hari-hari yang monoton? Yuk, ikutan Roasting by Rafli! Dalam acara spesial ini, Rafli akan berbagi cerita dan keluh kesah yang paling jujur dan kocak. Dijamin bikin malammu jadi lebih seru!',
            'location_uuid' => Location::inRandomOrder()->first()->uuid,
            'start_date' => '2025-12-01 09:00:00',
            'end_date' => '2025-12-01 17:00:00',
            'capacity' => 500,
            'is_tiket_war' => true,
            'queue_limit' => 1,
            'queue_open' => '2024-12-16 09:00:00',
        ]);

        Event::create([
            'slug' => fake()->slug(),
            'user_uuid' => User::inRandomOrder()->first()->uuid,
            'category_uuid' => Category::inRandomOrder()->first()->uuid,
            'name' => 'Startup Weekend 2024',
            'image' => 'startup_weekend.jpg',
            'description' => 'A weekend event for aspiring entrepreneurs to network, learn, and pitch their ideas.',
            'location_uuid' => Location::inRandomOrder()->first()->uuid,
            'start_date' => '2024-12-10 10:00:00',
            'end_date' => '2024-12-12 18:00:00',
            'capacity' => 300,
            'is_tiket_war' => false,
            'queue_limit' => null,
        ]);

        Event::create([
            'slug' => fake()->slug(),
            'user_uuid' => User::inRandomOrder()->first()->uuid,
            'category_uuid' => Category::inRandomOrder()->first()->uuid,
            'name' => 'Business Summit 2024',
            'image' => 'business_summit.jpg',
            'description' => 'An annual summit for business leaders and innovators to share insights on global markets.',
            'location_uuid' => Location::inRandomOrder()->first()->uuid,
            'start_date' => '2024-12-15 08:00:00',
            'end_date' => '2024-12-15 18:00:00',
            'capacity' => 400,
            'is_tiket_war' => true,
            'queue_limit' => 30,
        ]);

        Event::create([
            'slug' => fake()->slug(),
            'user_uuid' => User::inRandomOrder()->first()->uuid,
            'category_uuid' => Category::inRandomOrder()->first()->uuid,
            'name' => 'Music Festival 2024',
            'image' => 'music_festival.jpg',
            'description' => 'An exciting music festival featuring international and local bands and performers.',
            'location_uuid' => Location::inRandomOrder()->first()->uuid,
            'start_date' => '2024-12-20 15:00:00',
            'end_date' => '2024-12-20 23:59:00',
            'capacity' => 1000,
            'is_tiket_war' => true,
            'queue_limit' => 100,
        ]);

        Event::create([
            'slug' => fake()->slug(),
            'user_uuid' => User::inRandomOrder()->first()->uuid,
            'category_uuid' => Category::inRandomOrder()->first()->uuid,
            'name' => 'Art Exhibition 2024',
            'image' => 'art_exhibition.jpg',
            'description' => 'A prestigious art exhibition showcasing modern art from both emerging and renowned artists.',
            'location_uuid' => Location::inRandomOrder()->first()->uuid,
            'start_date' => '2024-12-25 10:00:00',
            'end_date' => '2024-12-25 18:00:00',
            'capacity' => 200,
            'is_tiket_war' => false,
            'queue_limit' => null,
        ]);


        Event::create([
            'slug' => fake()->slug(),
            'user_uuid' => User::inRandomOrder()->first()->uuid,
            'category_uuid' => Category::inRandomOrder()->first()->uuid,
            'name' => 'Digital Marketing Summit 2024',
            'image' => 'digital_marketing.jpg',
            'description' => 'A summit that brings together experts to discuss the latest trends in digital marketing.',
            'location_uuid' => Location::inRandomOrder()->first()->uuid,
            'start_date' => '2024-12-28 09:00:00',
            'end_date' => '2024-12-28 17:00:00',
            'capacity' => 350,
            'is_tiket_war' => true,
            'queue_limit' => 20,
        ]);


        Event::create([
            'slug' => fake()->slug(),
            'user_uuid' => User::inRandomOrder()->first()->uuid,
            'category_uuid' => Category::inRandomOrder()->first()->uuid,
            'name' => 'Blockchain Expo 2024',
            'image' => 'blockchain_expo.jpg',
            'description' => 'A global event showcasing the latest blockchain technologies and trends.',
            'location_uuid' => Location::inRandomOrder()->first()->uuid,
            'start_date' => '2024-12-29 10:00:00',
            'end_date' => '2024-12-29 18:00:00',
            'capacity' => 600,
            'is_tiket_war' => true,
            'queue_limit' => 50,
        ]);


        Event::create([
            'slug' => fake()->slug(),
            'user_uuid' => User::inRandomOrder()->first()->uuid,
            'category_uuid' => Category::inRandomOrder()->first()->uuid,
            'name' => 'Fashion Show 2024',
            'image' => 'fashion_show.jpg',
            'description' => 'An annual event showcasing the latest fashion trends and designers.',
            'location_uuid' => Location::inRandomOrder()->first()->uuid,
            'start_date' => '2024-12-30 19:00:00',
            'end_date' => '2024-12-30 23:00:00',
            'capacity' => 500,
            'is_tiket_war' => false,
            'queue_limit' => null,
        ]);


        Event::create([
            'slug' => fake()->slug(),
            'user_uuid' => User::inRandomOrder()->first()->uuid,
            'category_uuid' => Category::inRandomOrder()->first()->uuid,
            'name' => 'Sports Championship 2024',
            'image' => 'sports_championship.jpg',
            'description' => 'An exciting sports event with national and international athletes competing.',
            'location_uuid' => Location::inRandomOrder()->first()->uuid,
            'start_date' => '2024-12-18 10:00:00',
            'end_date' => '2024-12-18 20:00:00',
            'capacity' => 2000,
            'is_tiket_war' => true,
            'queue_limit' => 200,
        ]);


        Event::create([
            'slug' => fake()->slug(),
            'user_uuid' => User::inRandomOrder()->first()->uuid,
            'category_uuid' => Category::inRandomOrder()->first()->uuid,
            'name' => 'Food Expo 2024',
            'image' => 'music_expo.jpg',
            'description' => 'A music expo featuring top singers, local band performance, and music vendors.',
            'location_uuid' => Location::inRandomOrder()->first()->uuid,
            'start_date' => '2024-12-22 11:00:00',
            'end_date' => '2024-12-22 19:00:00',
            'capacity' => 800,
            'is_tiket_war' => false,
            'queue_limit' => null,
        ]);
    }
}
