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
            'slug' => 'standup-by-rafli',
            'user_uuid' => User::EO()->inRandomOrder()->first()->uuid,
            'category_uuid' => Category::inRandomOrder()->first()->uuid,
            'name' => 'Stand Up Comedy by Rafli',
            'image' => 'https://tse2.mm.bing.net/th?id=OIG3.G3lNmY0JO0kfgBo83nf4&pid=ImgGn',
            'description' => 'Bosan dengan hari-hari yang monoton? Yuk, ikutan Stand Up Comedy by Rafli! Dalam acara spesial ini, Rafli akan berbagi cerita dan keluh kesah yang paling jujur dan kocak. Dijamin bikin malammu jadi lebih seru!',
            'location_uuid' => Location::inRandomOrder()->first()->uuid,
            'start_date' => '2025-12-01 09:00:00',
            'end_date' => '2025-12-01 17:00:00',
            'capacity' => 500,
            'is_tiket_war' => true,
            'queue_limit' => 1,
            'queue_open' => '2025-12-16 09:00:00',
        ]);

        Event::create([
            'slug' => fake()->slug(),
            'user_uuid' => User::EO()->inRandomOrder()->first()->uuid,
            'category_uuid' => Category::inRandomOrder()->first()->uuid,
            'name' => 'Kontras by Abdur Arsyad',
            'image' => 'https://assets.loket.com/neo/production/images/banner/20240701194037_6682a3c593aad.jpg',
            'description' => '“Kontras” adalah sebuah pertunjukan stand-up comedy special ke-empat Abdur Arsyad yang mengangkat tema transportasi di Indonesia. Nama stand-up comedy special-nya kali ini diambil dari “Konten Transportasi” atau disingkat Kontras, di mana pada konten ini Abdur menampilkan perjalanan yang ia lakukan menggunakan beragam sarana transportasi terutama di wilayah Jakarta. Melalui “Kontras”, Abdur akan membahas seputar transportasi baik itu transportasi umum, pribadi, hingga perilaku pengguna transportasi.',
            'location_uuid' => Location::inRandomOrder()->first()->uuid,
            'start_date' => '2025-12-10 10:00:00',
            'end_date' => '2025-12-12 18:00:00',
            'capacity' => 300,
            'is_tiket_war' => false,
            'queue_limit' => null,
        ]);

        Event::create([
            'slug' => fake()->slug(),
            'user_uuid' => User::EO()->inRandomOrder()->first()->uuid,
            'category_uuid' => Category::inRandomOrder()->first()->uuid,
            'name' => 'REGINA SONG "FANGIRL: THE TOUR LIVE IN JAKARTA"',
            'image' => 'https://assets.loket.com/neo/production/images/banner/20241210200402_67583c4233371.jpg',
            'description' => 'REGINA SONG is a talented singer known for her soulful voice and emotive performances. Her recent album, Fangirl, features the hit song The Cutest Pair, which has captivated fans with its playful yet heartfelt lyrics. ',
            'location_uuid' => Location::inRandomOrder()->first()->uuid,
            'start_date' => '2025-12-15 08:00:00',
            'end_date' => '2025-12-15 18:00:00',
            'capacity' => 400,
            'is_tiket_war' => true,
            'queue_limit' => 1,
            'queue_open' => '2025-12-16 09:00:00',
        ]);

        Event::create([
            'slug' => fake()->slug(),
            'user_uuid' => User::EO()->inRandomOrder()->first()->uuid,
            'category_uuid' => Category::inRandomOrder()->first()->uuid,
            'name' => 'A Musical Drama: Symphony of Dreams',
            'image' => 'https://assets.loket.com/neo/production/images/banner/20241214125602_675d1df223fb6.jpg',
            'description' => "'A Musical Drama: Symphony of Dreams' is a performance presented by IFGF (International Full Gospel Fellowship) Kids Jakarta and HCS (Harvest Christian School). This event is a creative platform for the children of IFGF and HCS and an initiative to contribute to developing the World Harvest Transformation Center.",
            'location_uuid' => Location::inRandomOrder()->first()->uuid,
            'start_date' => '2025-12-20 15:00:00',
            'end_date' => '2025-12-20 23:59:00',
            'capacity' => 1000,
            'is_tiket_war' => true,
            'queue_limit' => 1,
            'queue_open' => '2025-12-16 09:00:00',
        ]);

        Event::create([
            'slug' => fake()->slug(),
            'user_uuid' => User::EO()->inRandomOrder()->first()->uuid,
            'category_uuid' => Category::inRandomOrder()->first()->uuid,
            'name' => 'Charity and Arts of Rumah Seni',
            'image' => 'https://assets.loket.com/neo/production/images/banner/20241212222007_675aff27dd488.jpg',
            'description' => 'Rumah Seni BEM KM FK UNAND kembali menghadirkan CHARS (Charity and Arts of Rumah Seni) yang menyuguhkan penampilan teatrikal musikal karya original anggota Rumah Seni. Acara ini akan menampilkan kolaborasi antara tari, teater, musik, dan vokal yang disuguhkan dalam bentuk drama musikal. Rumah Seni mengangkat sebuah cerita rakyat Minangkabau dengan judul “Sitti Nurbaya” karya Marah Rusli. Penampilan ini akan membawa penonton untuk hanyut dalam kisah suka dan duka perjalan cinta Sitti Nurbaya, seorang remaja yang menjalani kasih terpaksa, kasih yang tak sampai, dan kasih yang penuh pertentangan keluarga.',
            'location_uuid' => Location::inRandomOrder()->first()->uuid,
            'start_date' => '2025-12-25 10:00:00',
            'end_date' => '2025-12-25 18:00:00',
            'capacity' => 200,
            'is_tiket_war' => false,
            'queue_limit' => null,
        ]);


        Event::create([
            'slug' => fake()->slug(),
            'user_uuid' => User::EO()->inRandomOrder()->first()->uuid,
            'category_uuid' => Category::inRandomOrder()->first()->uuid,
            'name' => 'SMAKYS Classical Concert Night 2025',
            'image' => 'https://assets.loket.com/neo/production/images/banner/20241213150742_675beb4e25d86.jpg',
            'description' => 'SMAK Yos Sudarso turut mengambil bagian dalam memajukan dunia permusikan khususnya musik klasik dengan menyelenggarakan kegiatan pementasan konser musik klasik yang terbuka untuk khalayak umum. Bermula pada tahun 2022, SMAKYS Classical Concert Night membawa hasil diluar dugaan, ternyata animo masyarakat terhadap gelaran konser musik klasik sangat besar.',
            'location_uuid' => Location::inRandomOrder()->first()->uuid,
            'start_date' => '2025-12-28 09:00:00',
            'end_date' => '2025-12-28 17:00:00',
            'capacity' => 350,
            'is_tiket_war' => true,
            'queue_limit' => 1,
            'queue_open' => '2025-12-16 09:00:00',
        ]);


        Event::create([
            'slug' => fake()->slug(),
            'user_uuid' => User::EO()->inRandomOrder()->first()->uuid,
            'category_uuid' => Category::inRandomOrder()->first()->uuid,
            'name' => 'Cyberink - Weekday Skate',
            'image' => 'https://assets.loket.com/neo/production/images/banner/20241126155741_67458d85404a3.jpg',
            'description' => 'Bergabunglah dalam keseruan Euphoria On Wheels dan rasakan sensasi meluncur bebas di atas arena roller skate yang penuh energi!',
            'location_uuid' => Location::inRandomOrder()->first()->uuid,
            'start_date' => '2025-12-29 10:00:00',
            'end_date' => '2025-12-29 18:00:00',
            'capacity' => 600,
            'is_tiket_war' => true,
            'queue_limit' => 1,
            'queue_open' => '2025-12-16 09:00:00',
        ]);


        Event::create([
            'slug' => fake()->slug(),
            'user_uuid' => User::EO()->inRandomOrder()->first()->uuid,
            'category_uuid' => Category::inRandomOrder()->first()->uuid,
            'name' => 'JOYFUL YEAR-END GETAWAY',
            'image' => 'https://assets.loket.com/neo/production/images/banner/20241111173604_6731de149e041.jpg',
            'description' => 'JOYFUL YEAR-END GETAWAY This theme is designed to provide an unforgettable experience for guests, with a festive atmosphere and surprising lighting play, with the hope of providing an evening full of joy and fun in welcoming the new year.',
            'location_uuid' => Location::inRandomOrder()->first()->uuid,
            'start_date' => '2025-12-30 19:00:00',
            'end_date' => '2025-12-30 23:00:00',
            'capacity' => 500,
            'is_tiket_war' => false,
            'queue_limit' => null,
        ]);


        Event::create([
            'slug' => fake()->slug(),
            'user_uuid' => User::EO()->inRandomOrder()->first()->uuid,
            'category_uuid' => Category::inRandomOrder()->first()->uuid,
            'name' => 'Koploin Fest vol 2',
            'image' => 'https://assets.loket.com/neo/production/images/banner/20241206114805_6752820558b8b.jpg',
            'description' => 'Merupakan event tahunan di inhu yang kali ini tidak hanya menampilkan artis koplo nasional,kali ini beberapa musik khas beberapa daerah dengan artis ternama dari setiap daerah akan di tampilkan. Seperti musik dari ide timur, Minang pride, Batak pride dan tentunya jawa pride sesuai judul event yang bertema koplo.',
            'location_uuid' => Location::inRandomOrder()->first()->uuid,
            'start_date' => '2025-12-18 10:00:00',
            'end_date' => '2025-12-18 20:00:00',
            'capacity' => 2000,
            'is_tiket_war' => true,
            'queue_limit' => 1,
            'queue_open' => '2025-12-16 09:00:00',
        ]);


        Event::create([
            'slug' => fake()->slug(),
            'user_uuid' => User::EO()->inRandomOrder()->first()->uuid,
            'category_uuid' => Category::inRandomOrder()->first()->uuid,
            'name' => 'Spelling Bee National Competition',
            'image' => 'https://assets.loket.com/neo/production/images/banner/20241219170202_6763ef1a52be5.jpg',
            'description' => 'Ribuan speller terbaik dari seluruh Indonesia siap unjuk gigi di kompetisi mengeja terbesar se-Indonesia. Siapakah yang bakal jadi juara dan dinobatkan sebagai BEE THE ONE?',
            'location_uuid' => Location::inRandomOrder()->first()->uuid,
            'start_date' => '2025-12-22 11:00:00',
            'end_date' => '2025-12-22 19:00:00',
            'capacity' => 800,
            'is_tiket_war' => false,
            'queue_limit' => null,
        ]);
    }
}
