<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PatientVisit;
use App\Models\PatientLab;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PatientVisitTest>
 */
class PatientVisitTestFactory extends Factory
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
            'test_id' => PatientLab::inRandomOrder()->first()->id ?? PatientLab::factory(),
            
        ];
    }
}
