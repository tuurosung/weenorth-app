<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trade>
 */
class TradeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $trades = [
            'Carpentry' => 'Building and repairing wooden structures, furniture, and fixtures.',
            'Plumbing' => 'Installing and maintaining water supply, heating, and sanitation systems.',
            'Electrical Work' => 'Installing and maintaining electrical systems and equipment.',
            'Masonry' => 'Building structures from individual units of stone, brick, or concrete.',
            'Welding' => 'Joining metals using high heat and specialized equipment.',
            'Painting' => 'Applying paint, stain, and other finishes to buildings and structures.',
            'Roofing' => 'Installing and repairing roofs on residential and commercial buildings.',
            'Tailoring' => 'Creating, altering, and repairing clothing and garments.',
            'Hairdressing' => 'Cutting, styling, and treating hair for clients.',
            'Auto Mechanics' => 'Repairing and maintaining motor vehicles and their systems.',
            'Electronics Repair' => 'Fixing and maintaining electronic devices and equipment.',
            'Cooking' => 'Preparing and cooking food in various culinary styles.',
        ];

        $tradeName = fake()->randomElement(array_keys($trades));

        return [
            'trade_name' => $tradeName . ' ' . fake()->unique()->numberBetween(1, 100),
            'description' => $trades[$tradeName] . ' ' . fake()->sentence()
        ];
    }
}
