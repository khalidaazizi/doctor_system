<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Patient;           
use App\Models\PatientVisit;  

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PatientVisit>
 */
class PatientVisitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'patient_id' => Patient::factory(),
            'visit_date' => $this->faker->date(),
            'bp' => $this->faker->numerify('###/##'),
            'weight' => $this->faker->numberBetween(40, 100) . 'kg',
        ];
    }
}
