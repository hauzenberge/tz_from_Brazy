<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Helpers\PixaBayHelper;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $random_image = PixaBayHelper::getRandomImage();
        return [
            'title' => fake()->title(),
            'text' => fake()->text(),
            'photo_link' => $random_image["userImageURL"]
        ];
    }
}
