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

            'name' => 'Technology',
            'description' => 'Events related to technology and innovation.',
        ]);

        Event_Category::create([

            'name' => 'Business',
            'description' => 'Events related to business and entrepreneurship.',
        ]);

        Event_Category::create([

            'name' => 'Sport',
            'description' => 'Events related to sport and atletic.',
        ]);

        Event_Category::create([

            'name' => 'Art and Fashion',
            'description' => 'Events related to Fashion and Art.',
        ]);

        Event_Category::create([

            'name' => 'Music',
            'description' => 'Events related to music.',
        ]);
    }
}
