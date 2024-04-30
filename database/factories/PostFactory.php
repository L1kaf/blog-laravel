<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'content' => $this->faker->text(),
            'category_id' => Category::factory(),
            'preview_image' => UploadedFile::fake()->image('preview_image.jpg'),
            'main_image'  => UploadedFile::fake()->image('main_image.jpg'),
        ];
    }
}
