<?php
// database/factories/PatientMedicalInfoFactory.php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Patient;
use App\Models\PatientMedicalInfo;

class PatientMedicalInfoFactory extends Factory
{
    protected $model = PatientMedicalInfo::class;

    public function definition(): array
    {
        $bloodTypes = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
        $allergiesList = ['Penicillin', 'Aspirin', 'Ibuprofen', 'Codeine', 'Latex', 'Pollen'];
        $chronicConditions = ['Diabetes', 'Hypertension', 'Asthma', 'Heart Disease'];

        return [
            
            'patient_id' => Patient::factory(),
            'condition_name' => $this->faker->randomElement($chronicConditions),
            'condition_notes' => $this->faker->sentence(),
            'blood_type' => $this->faker->randomElement($bloodTypes),
            'allergies' => $this->faker->randomElements($allergiesList, $this->faker->numberBetween(0, 2)),
            'emergency_contact' => $this->faker->phoneNumber(),
        ];
    }

    // stateهای اختیاری برای شرایط مختلف
    public function withAllergies(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'allergies' => ['Penicillin', 'Aspirin'], // الرژی‌های ثابت
            ];
        });
    }

    public function withoutAllergies(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'allergies' => [],
            ];
        });
    }

    public function withSpecificBloodType(string $bloodType): static
    {
        return $this->state(function (array $attributes) use ($bloodType) {
            return [
                'blood_type' => $bloodType,
            ];
        });
    }

    public function withSpecificCondition(string $condition): static
    {
        return $this->state(function (array $attributes) use ($condition) {
            return [
                'condition_name' => $condition,
            ];
        });
    }
}