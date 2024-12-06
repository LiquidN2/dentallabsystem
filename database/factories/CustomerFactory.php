<?php

namespace Database\Factories;

use App\Enums\CustomerStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
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
            'name' => fake()->company(),
            'code' => fake()->unique()->numberBetween(1000, 99999),
            'status' => fake()->randomElement(CustomerStatus::cases())->value,
            'email' => fake()->unique()->email(),
            'phone' => fake()->unique()->phoneNumber(),
            'address' => fake()->unique()->streetAddress(),
            'city' => fake()->unique()->city(),
            'postcode' => fake()->unique()->postcode(),
        ];
    }
}
