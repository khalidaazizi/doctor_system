<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientLabSeeder extends Seeder
{
    public function run(): void
    {
        $tests = ['CBC','Glucose','Lipid Profile','Liver Function','Kidney Function','Urine Test','Blood Pressure','ECG','Thyroid Test','HIV Test'];

        $data = [];
        foreach ($tests as $t) {
            $data[] = [
                'test_name' => $t,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('patient_labs')->insert($data);
    }
}
