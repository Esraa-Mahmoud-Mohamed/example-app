<?php

namespace Database\Factories;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CouponFactory extends Factory
{
    protected $model = Coupon::class;

    public function definition(): array
    {
        $type = fake()->randomElement(['fixed', 'percentage']);

        return [
            'code' => strtoupper(fake()->unique()->bothify('????##')),

            'type' => $type,

            'value' => $type === 'fixed'
                ? fake()->numberBetween(10, 200)
                : fake()->numberBetween(5, 50),

            'minimum_order' => fake()->randomElement([
                0,
                50,
                100,
                200,
            ]),

            'maximum_discount' => $type === 'percentage'
                ? fake()->numberBetween(50, 500)
                : null,

            'usage_limit' => fake()->numberBetween(10, 1000),

            'used_count' => 0,

            'is_active' => true,

            'starts_at' => now(),

            'expires_at' => now()->addMonths(
                fake()->numberBetween(1, 12)
            ),
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn () => [
            'is_active' => false,
        ]);
    }

    public function expired(): static
    {
        return $this->state(fn () => [
            'starts_at' => now()->subMonth(),
            'expires_at' => now()->subDay(),
        ]);
    }

    public function percentage(): static
    {
        return $this->state(fn () => [
            'type' => 'percentage',
            'value' => fake()->numberBetween(5, 50),
            'maximum_discount' => fake()->numberBetween(50, 500),
        ]);
    }

    public function fixed(): static
    {
        return $this->state(fn () => [
            'type' => 'fixed',
            'value' => fake()->numberBetween(10, 200),
            'maximum_discount' => null,
        ]);
    }
}