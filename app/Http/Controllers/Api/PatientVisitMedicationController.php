<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PatientVisitMedication;
use Illuminate\Http\Request;

class PatientVisitMedicationController extends Controller
{
    public function index()
    {
        return response()->json(PatientVisitMedication::with(['patientVisit', 'medicineDetail'])->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_visit_id' => 'required|exists:patient_visits,id',
            'medicines_detail_id' => 'required|exists:medicine_details,id',
            'quantity' => 'required|integer|min:1',
            'dosage' => 'required|string|max:10',
        ]);

        $medication = PatientVisitMedication::create($validated);
        return response()->json($medication, 201);
    }

    public function show(PatientVisitMedication $visitMedication)
    {
        return response()->json($visitMedication->load(['patientVisit', 'medicineDetail']));
    }

    public function destroy(PatientVisitMedication $visitMedication)
    {
        $visitMedication->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }


}
