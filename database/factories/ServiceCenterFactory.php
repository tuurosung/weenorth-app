<?php

namespace Database\Factories;

use App\Models\District;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceCenter>
 */
class ServiceCenterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'district_id' => District::factory(),
            'location' => fake()->unique()->words(3, true) . ' Service Center',
            'town_city' => fake()->city(),
            'address' => fake()->streetAddress() . ', ' . fake()->secondaryAddress(),
            'email' => fake()->unique()->safeEmail(),
            'phone_number' => fake()->phoneNumber(),
            'center_representative' => fake()->name(),
            'opening_hours' => 'Monday-Friday: 8:00 AM - 5:00 PM, Saturday: 9:00 AM - 2:00 PM'
        ];
    }
}
