<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comic;
use App\Models\Faq;
use App\Models\Tag;
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
            'bio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ',
            'image_path' => 'images/default.jpg',
            'birthday' => '1990-01-01',
            'password' => 'hey',
            'is_admin' => true,
        ]);

        User::create([
            'name' => 'Test',
            'email' => 'test@test.com',
            'bio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ',
            'image_path' => 'images/default.jpg',
            'birthday' => '1990-01-01',
            'password' => 'test',
            'is_admin' => false,
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@ehb.be',
            'bio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ',
            'image_path' => 'images/default.jpg',
            'birthday' => '1990-01-01',
            'password' => 'Password!321',
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

        Tag::factory()
            ->sequence(
                ['name' => 'Action'],
                ['name' => 'Adventure'],
                ['name' => 'Comedy'],
                ['name' => 'Drama'],
                ['name' => 'Fantasy'],
                ['name' => 'Horror'],
                ['name' => 'Mystery'],
                ['name' => 'Romance'],
                ['name' => 'Sci-Fi'],
                ['name' => 'Thriller'],
                ['name' => 'Superhero'],
                ['name' => 'Dystopia'],
                ['name' => 'Historical'],
                ['name' => 'Crime'],
                ['name' => 'Western'],
            ) ->count(15) -> create();

        Comic::factory(20)->create();

        Faq::factory(20)->create();
    }
}
