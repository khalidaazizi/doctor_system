<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiseaseSeeder extends Seeder
{
    public function run(): void
    {
        $diseases = [
            'Flu','Cold','COVID-19','Asthma','Diabetes',
            'Migraine','Tuberculosis','Hepatitis','Chickenpox','Malaria'
        ];

        $data = [];
        foreach ($diseases as $d) {
            $data[] = [
                'disease_name' => $d,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('diseases')->insert($data);
    }
}
