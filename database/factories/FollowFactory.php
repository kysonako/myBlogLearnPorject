<?php

namespace Database\Factories;

use App\Models\Follow;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends Factory<Follow>
 */
class FollowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users= User::all();
        $followedUserId = $users->random()->id;
        $followerUserId = $users->where('id','!=' , $followedUserId)->random()->id;
        return [
            //
            'followed_user_id' => $followedUserId,
            'following_user_id' =>  $followerUserId,
        ];
    }
}
