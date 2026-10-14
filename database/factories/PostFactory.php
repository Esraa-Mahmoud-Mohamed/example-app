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
            'title' => fake()->sentence(),
            'title_ar' => fake('ar_SA')->sentence(),
            'content' => fake()->paragraph(),
            'content_ar' => fake('ar_SA')->paragraph(),

            'user_id' => User::query()->inRandomOrder()->value('id'),
        ];
    }
}
