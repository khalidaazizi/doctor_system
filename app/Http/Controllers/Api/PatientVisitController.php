<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PatientVisit;
use Illuminate\Http\Request;

class PatientVisitController extends Controller
{
    public function index()
    {
        return response()->json(PatientVisit::with('patient')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'visit_date' => 'required|date',
            'bp' => 'nullable|string|max:10',
            'weight' => 'nullable|string|max:10',
        ]);

        $visit = PatientVisit::create($validated);
        return response()->json($visit, 201);
    }

    public function show(PatientVisit $visit)
    {
        return response()->json($visit->load('patient'));
    }

    public function update(Request $request, PatientVisit $visit)
    {
        $validated = $request->validate([
            'visit_date' => 'sometimes|date',
            'bp' => 'nullable|string|max:10',
            'weight' => 'nullable|string|max:10',
        ]);

        $visit->update($validated);
        return response()->json($visit);
    }

    public function destroy(PatientVisit $visit)
    {
        $visit->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
