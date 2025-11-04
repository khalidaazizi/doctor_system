<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Disease;
class DiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $diseases = ['Flu', 'Cold', 'COVID-19', 'Asthma', 'Diabetes'];
        foreach ($diseases as $name) {
            Disease::create(['disease_name' => $name]);
        }
    }
}
