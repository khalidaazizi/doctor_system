<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientVisitTestSeeder extends Seeder
{
    /**
     * تولید نتیجه تست بر اساس نام تست (واقعی مثل لابراتوار)
     */
    private function generateResultByTestName(string $testName): array
    {
        $name = strtolower($testName);

        return match (true) {

            // CBC
            str_contains($name, 'cbc') => [
                'hemoglobin' => rand(11, 18) . ' g/dL',
                'wbc' => rand(4000, 11000) . ' /µL',
                'platelets' => rand(150000, 450000) . ' /µL',
                'status' => rand(0, 100) > 80 ? 'Abnormal' : 'Normal',
            ],

            // Glucose
            str_contains($name, 'glucose') => [
                'fasting' => rand(70, 180) . ' mg/dL',
                'status' => rand(0, 100) > 70 ? 'High' : 'Normal',
            ],

            // Lipid Profile
            str_contains($name, 'lipid') => [
                'cholesterol' => rand(150, 300) . ' mg/dL',
                'triglycerides' => rand(80, 260) . ' mg/dL',
                'status' => rand(0, 100) > 75 ? 'Abnormal' : 'Normal',
            ],

            // Liver Function
            str_contains($name, 'liver') => [
                'ALT' => rand(10, 95) . ' U/L',
                'AST' => rand(10, 80) . ' U/L',
                'status' => rand(0, 100) > 75 ? 'Abnormal' : 'Normal',
            ],

            // Kidney Function
            str_contains($name, 'kidney') => [
                'creatinine' => rand(6, 20) / 10 . ' mg/dL',
                'urea' => rand(10, 65) . ' mg/dL',
                'status' => rand(0, 100) > 70 ? 'Abnormal' : 'Normal',
            ],

            // Urine Test
            str_contains($name, 'urine') => [
                'result' => collect(['Normal', 'Protein +', 'Glucose +'])->random(),
            ],

            // Blood Pressure
            str_contains($name, 'pressure') => [
                'systolic' => rand(90, 160),
                'diastolic' => rand(60, 100),
                'status' => rand(0, 100) > 65 ? 'High' : 'Normal',
            ],

            // ECG
            str_contains($name, 'ecg') => [
                'result' => collect(['Normal', 'Arrhythmia', 'Abnormal'])->random(),
            ],

            // Thyroid
            str_contains($name, 'thyroid') => [
                'TSH' => rand(1, 9) . ' µIU/mL',
                'status' => rand(0, 100) > 70 ? 'Abnormal' : 'Normal',
            ],

            // HIV
            str_contains($name, 'hiv') => [
                'result' => collect(['Negative', 'Negative', 'Negative', 'Positive'])->random(),
            ],

            // پیش‌فرض
            default => [
                'value' => 'Normal',
            ],
        };
    }

    /**
     * اجرای Seeder
     */
    public function run(): void
    {
        $visitIds = DB::table('patient_visits')->pluck('id')->toArray();
        $testIds  = DB::table('patient_labs')->pluck('id')->toArray();

        foreach ($visitIds as $visitId) {

            shuffle($testIds);

            // هر ویزیت 1 یا 2 تست
            $selectedTests = array_slice($testIds, 0, rand(1, 2));

            foreach ($selectedTests as $testId) {

                $testName = DB::table('patient_labs')
                    ->where('id', $testId)
                    ->value('test_name');

                $result = $this->generateResultByTestName($testName);

                DB::table('patient_visit_tests')->insert([
                    'patient_visit_id' => $visitId,
                    'test_id' => $testId,
                    'test_result' => json_encode($result),
                    'status' => 'completed',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
