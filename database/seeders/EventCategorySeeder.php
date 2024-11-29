<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event_Category;
use Illuminate\Support\Str;

class EventCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event_Category::create([
            'category_uuid' => Str::uuid(),
            'category_name' => 'Technology',
            'category_description' => 'Events related to technology and innovation.',
        ]);

        Event_Category::create([
            'category_uuid' => Str::uuid(),
            'category_name' => 'Business',
            'category_description' => 'Events related to business and entrepreneurship.',
        ]);

        Event_Category::create([
            'category_uuid' => Str::uuid(),
            'category_name' => 'Sport',
            'category_description' => 'Events related to sport and atletic.',
        ]);

        Event_Category::create([
            'category_uuid' => Str::uuid(),
            'category_name' => 'Art and Fashion',
            'category_description' => 'Events related to Fashion and Art.',
        ]);

        Event_Category::create([
            'category_uuid' => Str::uuid(),
            'category_name' => 'Music',
            'category_description' => 'Events related to music.',
        ]);


    }
}
