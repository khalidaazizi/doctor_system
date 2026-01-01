<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PatientVisitDisease;
use Illuminate\Http\Request;

class PatientVisitDiseaseController extends Controller
{
    public function index()
    {
        return response()->json(PatientVisitDisease::with(['patientVisit', 'disease'])->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_visit_id' => 'required|exists:patient_visits,id',
            'disease_id' => 'required|exists:diseases,id',
        ]);

        $data = PatientVisitDisease::create($validated);
        return response()->json($data, 201);
    }

    public function show(PatientVisitDisease $visitDisease)
    {
        return response()->json($visitDisease->load(['patientVisit', 'disease']));
    }

    public function update(Request $request, PatientVisitDisease $visitDisease)
    {
        $validated = $request->validate([
            'patient_visit_id' => 'sometimes|exists:patient_visits,id',
            'disease_id' => 'sometimes|exists:diseases,id',
        ]);

        $visitDisease->update($validated);
        return response()->json($visitDisease);
    }

    public function destroy(PatientVisitDisease $visitDisease)
    {
        $visitDisease->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }


}
