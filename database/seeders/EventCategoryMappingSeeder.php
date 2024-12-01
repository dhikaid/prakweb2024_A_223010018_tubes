<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event_Categories_Mapping;
use Illuminate\Support\Str;

class EventCategoryMappingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event_Categories_Mapping::create([
            'mapping_uuid' => Str::uuid(),
            'event_id' => 1, // Sesuaikan dengan event_id
            'category_id' => 1, // Sesuaikan dengan category_id
        ]);

        Event_Categories_Mapping::create([
            'mapping_uuid' => Str::uuid(),
            'event_id' => 2, // Sesuaikan dengan event_id
            'category_id' => 1, // Sesuaikan dengan category_id
        ]);

        Event_Categories_Mapping::create([
            'mapping_uuid' => Str::uuid(),
            'event_id' => 3, // Sesuaikan dengan event_id
            'category_id' => 2, // Sesuaikan dengan category_id
        ]);

        Event_Categories_Mapping::create([
            'mapping_uuid' => Str::uuid(),
            'event_id' => 4, // Sesuaikan dengan event_id
            'category_id' => 5, // Sesuaikan dengan category_id
        ]);

        Event_Categories_Mapping::create([
            'mapping_uuid' => Str::uuid(),
            'event_id' => 5, // Sesuaikan dengan event_id
            'category_id' => 4, // Sesuaikan dengan category_id
        ]);

        Event_Categories_Mapping::create([
            'mapping_uuid' => Str::uuid(),
            'event_id' => 6, // Sesuaikan dengan event_id
            'category_id' => 1, // Sesuaikan dengan category_id
        ]);

        Event_Categories_Mapping::create([
            'mapping_uuid' => Str::uuid(),
            'event_id' => 7, // Sesuaikan dengan event_id
            'category_id' => 1, // Sesuaikan dengan category_id
        ]);

        Event_Categories_Mapping::create([
            'mapping_uuid' => Str::uuid(),
            'event_id' => 8, // Sesuaikan dengan event_id
            'category_id' => 4, // Sesuaikan dengan category_id
        ]);

        Event_Categories_Mapping::create([
            'mapping_uuid' => Str::uuid(),
            'event_id' => 9, // Sesuaikan dengan event_id
            'category_id' => 3, // Sesuaikan dengan category_id
        ]);

        Event_Categories_Mapping::create([
            'mapping_uuid' => Str::uuid(),
            'event_id' => 10, // Sesuaikan dengan event_id
            'category_id' => 1, // Sesuaikan dengan category_id
        ]);

    }
}
