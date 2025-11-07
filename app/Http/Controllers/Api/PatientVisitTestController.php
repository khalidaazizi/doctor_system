<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PatientVisitTest;
use Illuminate\Http\Request;

class PatientVisitTestController extends Controller
{
    public function index()
    {
        return response()->json(PatientVisitTest::with(['patientVisit', 'test'])->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_visit_id' => 'required|exists:patient_visits,id',
            'test_id' => 'required|exists:patient_labs,id',
        ]);

        $test = PatientVisitTest::create($validated);
        return response()->json($test, 201);
    }

    public function show(PatientVisitTest $visitTest)
    {
        return response()->json($visitTest->load(['patientVisit', 'test']));
    }

    public function destroy(PatientVisitTest $visitTest)
    {
        $visitTest->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
