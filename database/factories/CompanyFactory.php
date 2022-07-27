<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->company,
            'province' => fake()->address,
            'city' => fake()->city,
            'address' => fake()->streetAddress,
            'postal_code' => fake()->postcode,
            'email' => fake()->unique()->email,
            'phone' => fake()->phoneNumber,
        ];
    }
}
