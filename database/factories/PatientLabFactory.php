<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PatientLab>
 */
class PatientLabFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'test_name' => $this->faker->randomElement(['Blood Test', 'X-Ray', 'Urine Test', 'CT Scan']),
        ];
    }
}
