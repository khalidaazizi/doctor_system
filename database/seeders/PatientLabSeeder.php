<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PatientLab;

class PatientLabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        $tests = ['Blood Test', 'X-Ray', 'Urine Test', 'CT Scan', 'MRI'];
        foreach ($tests as $test) {
            PatientLab::create(['test_name' => $test]);
        }
    }
}
