<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    private static $user_id = 1;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = ["Pria", "Wanita"];

        return [
            'nik' => fake()->unique()->randomNumber(9),
            'npwp' => fake()->unique()->randomNumber(9),
            'ktp' => fake()->unique()->randomNumber(9),
            'ktp_address' => fake()->address,
            'city' => fake()->city,
            'address' => fake()->address,
            'phone' => fake()->phoneNumber,
            'place_of_birth' => fake()->city,
            'date_of_birth' => fake()->date,
            'gender' => $gender[rand(0, 1)],
            'blood_group' => 'O',
            'religion' => 'Islam',
            'marital_status' => 'Menikah',
            'email_recovery' => '',
            'user_id' => EmployeeFactory::$user_id++,
            'job_id' => rand(1, 25),
        ];
    }
}
