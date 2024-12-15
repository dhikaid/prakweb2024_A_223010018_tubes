<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event_Categories_Mapping;
use App\Models\Event_Category;
use Illuminate\Support\Str;

class EventCategoryMappingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event_Categories_Mapping::create([
            'event_uuid' => Event::inRandomOrder()->first()->uuid, // Sesuaikan dengan event_id
            'category_uuid' => Event_Category::inRandomOrder()->first()->uuid, // Sesuaikan dengan category_id
        ]);

        Event_Categories_Mapping::create([

            'event_uuid' => Event::inRandomOrder()->first()->uuid, // Sesuaikan dengan event_id
            'category_uuid' => Event_Category::inRandomOrder()->first()->uuid, // Sesuaikan dengan category_id
        ]);

        Event_Categories_Mapping::create([

            'event_uuid' => Event::inRandomOrder()->first()->uuid, // Sesuaikan dengan event_id
            'category_uuid' => Event_Category::inRandomOrder()->first()->uuid, // Sesuaikan dengan category_id
        ]);

        Event_Categories_Mapping::create([

            'event_uuid' => Event::inRandomOrder()->first()->uuid, // Sesuaikan dengan event_id
            'category_uuid' => Event_Category::inRandomOrder()->first()->uuid, // Sesuaikan dengan category_id
        ]);

        Event_Categories_Mapping::create([

            'event_uuid' => Event::inRandomOrder()->first()->uuid, // Sesuaikan dengan event_id
            'category_uuid' => Event_Category::inRandomOrder()->first()->uuid, // Sesuaikan dengan category_id
        ]);

        Event_Categories_Mapping::create([

            'event_uuid' => Event::inRandomOrder()->first()->uuid, // Sesuaikan dengan event_id
            'category_uuid' => Event_Category::inRandomOrder()->first()->uuid, // Sesuaikan dengan category_id
        ]);

        Event_Categories_Mapping::create([

            'event_uuid' => Event::inRandomOrder()->first()->uuid, // Sesuaikan dengan event_id
            'category_uuid' => Event_Category::inRandomOrder()->first()->uuid, // Sesuaikan dengan category_id
        ]);

        Event_Categories_Mapping::create([

            'event_uuid' => Event::inRandomOrder()->first()->uuid, // Sesuaikan dengan event_id
            'category_uuid' => Event_Category::inRandomOrder()->first()->uuid, // Sesuaikan dengan category_id
        ]);

        Event_Categories_Mapping::create([

            'event_uuid' => Event::inRandomOrder()->first()->uuid, // Sesuaikan dengan event_id
            'category_uuid' => Event_Category::inRandomOrder()->first()->uuid, // Sesuaikan dengan category_id
        ]);

        Event_Categories_Mapping::create([

            'event_uuid' => Event::inRandomOrder()->first()->uuid, // Sesuaikan dengan event_id
            'category_uuid' => Event_Category::inRandomOrder()->first()->uuid, // Sesuaikan dengan category_id
        ]);
    }
}
