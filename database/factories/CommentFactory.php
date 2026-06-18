<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Post;
/**
 * @extends Factory<Comment>
 */
class CommentFactory extends Factory
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
            'body' => fake()->sentence(40),
            'user_id' => fake()->randomElement(User::pluck('id')->toArray()),
            'post_id' => fake()->randomElement(Post::pluck('id')->toArray()),
        ];
    }
}
