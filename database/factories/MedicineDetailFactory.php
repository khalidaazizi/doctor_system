<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MedicineDetail>
 */
class MedicineDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'medicines_id' => Medicine::factory(),
            'packing' => $this->faker->randomElement(['Tablet', 'Capsule', 'Syrup', 'Injection']),
        ];
    }
}
