<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class EventCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([

            'name' => 'Technology',
            'description' => 'Events related to technology and innovation.',
        ]);

        Category::create([

            'name' => 'Business',
            'description' => 'Events related to business and entrepreneurship.',
        ]);

        Category::create([

            'name' => 'Sport',
            'description' => 'Events related to sport and atletic.',
        ]);

        Category::create([

            'name' => 'Art and Fashion',
            'description' => 'Events related to Fashion and Art.',
        ]);

        Category::create([

            'name' => 'Music',
            'description' => 'Events related to music.',
        ]);
    }
}
