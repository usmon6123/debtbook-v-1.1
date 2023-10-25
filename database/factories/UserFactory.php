<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{

    public function definition(): array
    {
        return [
            'role_id'=>2,
            'name' => fake()->name(),
            'password'=>Hash::make(fake()->sentence),
            'email' => fake()->unique()->safeEmail(),
            'phone_number'=>'+998'.fake()->unique()->numberBetween(100000000,999999999),
            'total' =>0,
            'description'=>$this->faker->sentence,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
