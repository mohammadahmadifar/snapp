<?php

namespace Database\Factories;

use App\Constants\CardNumberConstants;
use App\Models\AccountNumber;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AccountNumber>
 */
class CardNumberFactory extends Factory
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
            'card_number' => $this->faker->randomElement(CardNumberConstants::$bankCardNumbers) .
                $this->faker->unique()->numberBetween(1000000000,9999999999),
       ];
    }

}
