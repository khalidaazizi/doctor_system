<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // غیرفعال کردن FK قبل از حذف داده‌ها
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // حذف داده‌ها
        DB::table('patient_visit_tests')->truncate();
        DB::table('patient_visits_medications')->truncate();
        DB::table('patient_visits_diseases')->truncate();
        DB::table('patient_visits')->truncate();
        DB::table('patient_medical_infos')->truncate();
        DB::table('patients')->truncate();
        DB::table('users')->truncate();
        DB::table('medicine_details')->truncate();
        DB::table('medicines')->truncate();
        DB::table('patient_labs')->truncate();
        DB::table('diseases')->truncate();

        // فعال کردن FK دوباره
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // اجرای Seederها به ترتیب درست
        $this->call([
            DoctorSeeder::class,
            PatientSeeder::class,
            PatientMedicalInfoSeeder::class,
            PatientVisitSeeder::class,
            DiseaseSeeder::class,
            MedicineSeeder::class,
            MedicineDetailSeeder::class,
            PatientLabSeeder::class,
            PatientVisitsDiseaseSeeder::class,
            PatientVisitsMedicationSeeder::class,
            PatientVisitTestSeeder::class,
        ]);
    }
}
