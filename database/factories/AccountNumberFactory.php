<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AccountNumber>
 */
class AccountNumberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'account_number' => $this->faker->unique()->numberBetween(1111111111,9999999999),
            'balance' => $this->faker->unique()->numberBetween(5000000,9999999999),
       ];
    }

}
