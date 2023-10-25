<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DebtList>
 */
class DebtListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $debtSum =  $this->faker->numberBetween(-300,300)*1000;
        $io = !($debtSum > 0);
        return [
            'debtor_id' => rand(4,User::all()->count()),
            'debt_sum'=> $debtSum,
            'in_or_out'=>$io,
            'seller_id'=>rand(1,3),
            'description'=>$this->faker->sentence
        ];
    }

}
