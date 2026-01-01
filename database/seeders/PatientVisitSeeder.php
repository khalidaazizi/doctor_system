<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PatientVisitSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = ['scheduled', 'completed', 'cancelled'];
        $visitTypes = ['consultation', 'emergency', 'follow-up', 'checkup'];
        $treatmentFee = [200, 250, 300, 350, 400, 450, 500];

        $patients = DB::table('patients')->pluck('id')->toArray();

        foreach ($patients as $i => $patientId) {

            // تاریخ ویزیت (امروز یا روزهای بعد)
            $visitDate = Carbon::now()->addDays($i);

            // نیکست ویزیت: رندم بین 30 تا 120 روز بعد
            $nextVisitDate = (clone $visitDate)->addDays(rand(30, 120));

            $time = Carbon::createFromTime(11, 0, 0)
                ->addMinutes(rand(0, 59))
                ->addSeconds(rand(0, 59))
                ->format('H:i:s');

            DB::table('patient_visits')->insert([
                'patient_id' => $patientId,
                'bp' => rand(110, 140) . '/' . rand(70, 90),
                'weight' => rand(50, 90) . ' kg',
                'note' => 'Patient showed mild symptoms.',
                'status' => $statuses[array_rand($statuses)],
                'treatment_fee' => $treatmentFee[array_rand($treatmentFee)],
                'visit_date' => $visitDate->format('Y-m-d'),
                'next_visit_date' => $nextVisitDate->format('Y-m-d'),
                'visit_time' => $time,
                'visit_type' => $visitTypes[array_rand($visitTypes)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
