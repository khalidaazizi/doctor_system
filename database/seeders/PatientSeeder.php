<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientSeeder extends Seeder
{
    public function run(): void
    {
        $patients = [
            ['patients_name' => 'Ahmad', 'date_of_birth' => '1985-04-12', 'gender' => 0, 'phone_number' => '+93700123456'],
            ['patients_name' => 'Fatima', 'date_of_birth' => '1990-06-21', 'gender' => 1, 'phone_number' => '+93700123457'],
            ['patients_name' => 'Zahra', 'date_of_birth' => '1988-11-03', 'gender' => 1, 'phone_number' => '+93700123458'],
            ['patients_name' => 'Mohammad', 'date_of_birth' => '1975-09-17', 'gender' => 0, 'phone_number' => '+93700123459'],
            ['patients_name' => 'Hassan', 'date_of_birth' => '1992-02-25', 'gender' => 0, 'phone_number' => '+93700123460'],
            ['patients_name' => 'Leyla', 'date_of_birth' => '1983-08-14', 'gender' => 1, 'phone_number' => '+93700123461'],
            ['patients_name' => 'Sami', 'date_of_birth' => '1980-12-05', 'gender' => 0, 'phone_number' => '+93700123462'],
            ['patients_name' => 'Nasim', 'date_of_birth' => '1995-03-19', 'gender' => 1, 'phone_number' => '+93700123463'],
            ['patients_name' => 'Yasmin', 'date_of_birth' => '1987-07-30', 'gender' => 1, 'phone_number' => '+93700123464'],
            ['patients_name' => 'Omar', 'date_of_birth' => '1991-01-11', 'gender' => 0, 'phone_number' => '+93700123465'],
        ];

        foreach ($patients as &$p) {
            $p['created_at'] = now();
            $p['updated_at'] = now();
        }

        DB::table('patients')->insert($patients);
    }
}
