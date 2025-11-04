<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\PatientVisit;
use App\Models\MedicineDetail;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PatientVisitsMedication>
 */
class PatientVisitsMedicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'patient_visit_id' => PatientVisit::inRandomOrder()->first()->id ?? PatientVisit::factory(),
            'medicines_detail_id' => MedicineDetail::inRandomOrder()->first()->id ?? MedicineDetail::factory(),
            'quantity' => $this->faker->numberBetween(1, 5),
            'dosage' => $this->faker->randomElement(['1x per day','2x per day','3x per day']),
        ];
    }
}
