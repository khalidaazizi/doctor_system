<?php
// app/Http/Controllers/Api/PatientHistoryController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientHistoryController extends Controller
{
    public function getPatientHistory($patientId)
    {
        try {
            $patient = Patient::with([
                'medicalInfo', // اطلاعات پزشکی جدید
                'visits' => function($query) {
                    $query->orderBy('visit_date', 'desc')
                          ->orderBy('visit_time', 'desc');
                },
                'visits.diseases',
                'visits.medications.medicineDetail.medicine',
                'visits.tests'
            ])->find($patientId);

            if (!$patient) {
                return response()->json(['error' => 'Patient not found'], 404);
            }

            $patientData = $patient->toArray();
            $patientData['age'] = $patient->age;
            $patientData['gender_text'] = $patient->gender_text;

            return response()->json([
                'patient' => $patientData,
                'visits' => $patient->visits
            ]);

        } catch (\Exception $e) {
            \Log::error('Patient History Error: ' . $e->getMessage());
            return response()->json([
                'error' => 'Server error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}