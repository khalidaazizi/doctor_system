<?php
// database/factories/PatientVisitFactory.php

namespace Database\Factories;

use App\Models\PatientVisit;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientVisitFactory extends Factory
{
    protected $model = PatientVisit::class;

    public function definition(): array
    {
        return [
            'patient_id' => Patient::factory(),
            'visit_date' => $this->faker->date(),
            'visit_time' => $this->faker->time(),
            'bp' => $this->faker->numerify('###/##'),
            'weight' => $this->faker->numberBetween(40, 100) . 'kg',
            'status' => $this->faker->randomElement(['scheduled', 'completed', 'cancelled']),
            'treatment_fee' => $this->faker->numberBetween(50, 200),
             'visit_type' => $this->faker->randomElement([
                'checkup',
                'follow-up', 
                'emergency',
                'consultation'
            ]),
            'note' => $this->faker->sentence(6),
        ];
    }
}