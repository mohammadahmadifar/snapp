<?php

namespace Database\Factories;

use App\Constants\CartNumberConstants;
use App\Models\AccountNumber;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AccountNumber>
 */
class CartNumberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'account_number_id' => AccountNumber::all()->random()->id,
            'cart_number' => $this->faker->randomElement(CartNumberConstants::$bankCartNumber) .
                $this->faker->unique()->numberBetween(0000000000,9999999999),
       ];
    }

}
