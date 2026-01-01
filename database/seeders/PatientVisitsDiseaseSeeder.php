<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientVisitsDiseaseSeeder extends Seeder
{
    public function run(): void
    {
        $visitIds = DB::table('patient_visits')->pluck('id')->toArray();
        $diseaseIds = DB::table('diseases')->pluck('id')->toArray();

        foreach ($visitIds as $visitId) {
            shuffle($diseaseIds);
            $selected = array_slice($diseaseIds, 0, rand(1,2));

            foreach ($selected as $dId) {
                DB::table('patient_visits_diseases')->insert([
                    'patient_visit_id' => $visitId,
                    'disease_id' => $dId,
   
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
