<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use illuminate\support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $title = fake()->sentence(rand(6, 8));
        return [
            'title' => $title,
            'author_id' => User::Factory(),
            'category_id' => Category::factory(),
            'slug' => str::slug($title),
            'body' => fake()->text()
        ];
    }
}
