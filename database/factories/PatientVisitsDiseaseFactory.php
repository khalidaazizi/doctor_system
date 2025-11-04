<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PatientVisit;
use App\Models\Disease;
use App\Models\PatientVisitsDisease;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PatientVisitsDisease>
 */
class PatientVisitsDiseaseFactory extends Factory
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
            'disease_id' => Disease::inRandomOrder()->first()->id ?? Disease::factory(),
        ];
    }
}
