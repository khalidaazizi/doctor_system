<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PatientVisitTest;

class PatientVisitTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        PatientVisitTest::factory(30)->create();
    }
}
