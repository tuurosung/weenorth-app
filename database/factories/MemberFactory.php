<?php

namespace Database\Factories;

use App\Models\District;
use App\Models\Region;
use App\Models\Trade;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $memberCounter = 1;

        return [
            'member_id' => 'MEM' . str_pad($memberCounter++, 4, '0', STR_PAD_LEFT),
            'cohort' => fake()->randomElement(['2024-A', '2024-B', '2023-A', '2023-B', null]),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'date_of_birth' => fake()->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'),
            'gender' => fake()->randomElement(['male', 'female', 'other']),
            'address' => fake()->address(),
            'region_id' => Region::inRandomOrder()->first()?->id,
            'district_id' => District::inRandomOrder()->first()?->id,
            'trade_id' => Trade::inRandomOrder()->first()?->id,
            'experience_years' => fake()->numberBetween(0, 25),
            'skill_level' => fake()->randomElement(['beginner', 'intermediate', 'advanced', 'expert']),
            'membership_type' => fake()->randomElement(['individual', 'corporate', 'student']),
            'membership_status' => fake()->randomElement(['active', 'inactive', 'suspended', 'pending']),
            'joined_date' => fake()->dateTimeBetween('-3 years', 'now')->format('Y-m-d'),
            'bio' => fake()->optional(0.7)->paragraph(),
            'is_verified' => fake()->boolean(60), // 60% chance of being verified
            'email_verified_at' => fake()->optional(0.8)->dateTime(),
        ];
    }

    /**
     * Indicate that the member is active.
     */
    public function active(): static
    {
        return $this->state(fn (array $attributes) => [
            'membership_status' => 'active',
            'is_verified' => true,
            'email_verified_at' => now(),
        ]);
    }

    /**
     * Indicate that the member is pending.
     */
    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'membership_status' => 'pending',
            'is_verified' => false,
            'email_verified_at' => null,
        ]);
    }

    /**
     * Indicate that the member is a student.
     */
    public function student(): static
    {
        return $this->state(fn (array $attributes) => [
            'membership_type' => 'student',
            'experience_years' => fake()->numberBetween(0, 2),
            'skill_level' => fake()->randomElement(['beginner', 'intermediate']),
        ]);
    }
}
