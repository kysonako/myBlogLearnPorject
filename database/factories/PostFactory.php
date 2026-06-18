<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
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
            //
            'title' => fake()->sentence(6),
            'picture' => null,
            'body' => fake()->paragraph(50),
            'author_id' => fake()->randomElement(User::pluck('id')->toArray()),
            'status' =>  fake()->randomElement(['draft','published']),
        ];
    }
}
