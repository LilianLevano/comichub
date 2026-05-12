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
                ['name' => 'DC Universe'],
                ['name' => 'Marvel'],
                ['name' => 'The Boys'],
                ['name' => 'Invincible'],
                ['name' => 'Other'],
            )
            ->count(5)
            ->create();

        Comic::factory(20)->create();
    }
}
