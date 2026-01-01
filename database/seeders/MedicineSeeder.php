<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicineSeeder extends Seeder
{
    public function run(): void
    {
        $medicines = ['Paracetamol','Amoxicillin','Ibuprofen','Metformin','Aspirin','Omeprazole','Cefixime','Azithromycin','Loratadine','Captopril'];

        foreach ($medicines as $name) {
            DB::table('medicines')->insert([
                'medicines_name' => $name,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
