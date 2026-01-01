<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientMedicalInfoSeeder extends Seeder
{
    public function run(): void
    {
        $patients = DB::table('patients')->pluck('id')->toArray();
        $bloodTypes = ['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'];
        $commonAllergies = ['Dust', 'Pollen', 'Penicillin', 'Seafood'];

        $infos = [];
        foreach ($patients as $patientId) {
            shuffle($commonAllergies);
            $infos[] = [
                'patient_id' => $patientId,
                'condition_name' => 'Hypertension',
                'condition_notes' => 'Needs regular monitoring',
                'blood_type' => $bloodTypes[array_rand($bloodTypes)],
                'allergies' => json_encode(array_slice($commonAllergies, 0, rand(1, 3))),
                'emergency_contact' => '+93700' . rand(100000, 999999),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('patient_medical_infos')->insert($infos);
    }
}
