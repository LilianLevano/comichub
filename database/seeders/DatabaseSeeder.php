<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comic;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       User::factory(10)->create();

        Category::factory()
            ->sequence(
                ['name' => 'Books'],
                ['name' => 'Sport'],
                ['name' => 'Kitchen'],
                ['name' => 'Politics'],
                ['name' => 'Video-Games'],
            )
            ->count(5)
            ->create();

        Comic::factory(20)->create();
    }
}
