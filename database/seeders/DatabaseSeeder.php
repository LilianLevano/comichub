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

        User::create([
            'name' => 'Lilian Levano',
            'email' => 'lilian@levano.com',
            'password' => '$2y$12$jIh.B2y9M63ecBCwINHt7eJF/ljMoTb/SHcFiJtvDNVCWskfrNQwm',
            'is_admin' => true,
        ]);

        Category::factory()
            ->sequence(
                ['name' => 'DC Universe'],
                ['name' => 'Marvel'],
                ['name' => 'The Boys'],
                ['name' => 'Invincible'],
                ['name' => 'Spawn'],
                ['name' => 'Hellboy'],
                ['name' => 'Transformers'],
                ['name' => 'Teenage Mutant Ninja Turtles'],
                ['name' => 'Sin City'],
                ['name' => 'Watchmen'],
                ['name' => 'Sandman'],
                ['name' => 'Judge Dredd'],
                ['name' => 'Saga'],
                ['name' => 'Kick-Ass'],
                ['name' => 'Witchblade'],
                ['name' => 'Bloodshot'],
                ['name' => 'X-O Manowar'],
                ['name' => 'Bone'],
                ['name' => 'Astro City'],
                ['name' => 'Other'],
            )
            ->count(20)
            ->create();

        Comic::factory(50)->create();
    }
}
