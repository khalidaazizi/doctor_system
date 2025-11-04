<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Patient;
use App\Models\PatientVisit;
use App\Models\Disease;
use App\Models\PatientVisitsDisease;
use App\Models\PatientVisitsMedication;
use App\Models\MedicineDetail;
use App\Models\PatientVisitTest;
use App\Models\PatientLab;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        // ساخت چند مریض
        Patient::factory(5)->create()->each(function ($patient) {
            // هر مریض چند ویزیت دارد
            $visits = $patient->visits()->saveMany(
                PatientVisit::factory(2)->make()
            );

            foreach ($visits as $visit) {
                // اتصال بیماری‌ها
                $diseaseIds = Disease::inRandomOrder()->take(2)->pluck('id');
                foreach ($diseaseIds as $diseaseId) {
                    PatientVisitsDisease::create([
                        'patient_visit_id' => $visit->id,
                        'disease_id' => $diseaseId,
                    ]);
                }

                // اتصال داروها
                $medicineDetailIds = MedicineDetail::inRandomOrder()->take(2)->pluck('id');
                foreach ($medicineDetailIds as $detailId) {
                    PatientVisitsMedication::create([
                        'patient_visit_id' => $visit->id,
                        'medicines_detail_id' => $detailId,
                        'quantity' => rand(1, 3),
                        'dosage' => rand(1, 2) . 'x/day',
                    ]);
                }

                // اتصال آزمایش‌ها
                $labIds = PatientLab::inRandomOrder()->take(2)->pluck('id');
                foreach ($labIds as $labId) {
                    PatientVisitTest::create([
                        'patient_visit_id' => $visit->id,
                        'test_id' => $labId,
                    ]);
                }
            }
        });
    }
}
