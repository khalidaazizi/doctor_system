<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientVisitsMedicationSeeder extends Seeder
{
    public function run(): void
    {
        $visitIds = DB::table('patient_visits')->pluck('id')->toArray();
        $medIds = DB::table('medicine_details')->pluck('id')->toArray();

        foreach ($visitIds as $visitId) {
            shuffle($medIds);
            $selected = array_slice($medIds, 0, rand(1,2));

            foreach ($selected as $medId) {
                DB::table('patient_visits_medications')->insert([
                    'patient_visit_id' => $visitId,
                    'medicines_detail_id' => $medId,
                    'quantity' => rand(1,3),
                    'dosage' => rand(1,2).'x/day',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
