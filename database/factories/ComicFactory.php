<?php

namespace Database\Factories;

use App\Models\Comic;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComicFactory extends Factory
{
    protected $model = Comic::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(3, true),
            'author' => $this->faker->name(),
            'user_id' => $this->faker->numberBetween(1, 10),
            'release_date' => $this->faker->date(),
            'image_path' => $this->faker->imageUrl(),
            'category_id' => $this->faker->numberBetween(1, 20),
        ];
    }
}
