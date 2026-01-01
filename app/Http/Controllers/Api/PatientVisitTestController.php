<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PatientVisitTest;
use Illuminate\Http\Request;

class PatientVisitTestController extends Controller
{
    public function index()
    {
        return response()->json(
            PatientVisitTest::with(['visit.patient', 'test'])->latest()->get()
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_visit_id' => 'required|exists:patient_visits,id',
            'test_id' => 'required|exists:patient_labs,id',
            'test_result' => 'nullable|string',
            'status' => 'nullable|in:pending,completed,cancelled',
        ]);

        $test = PatientVisitTest::create([
            ...$validated,
            'status' => $validated['status'] ?? 'pending',
        ]);

        return response()->json($test, 201);
    }

    public function show(PatientVisitTest $visitTest)
    {
        return response()->json(
            $visitTest->load(['visit.patient', 'test'])
        );
    }

    public function destroy(PatientVisitTest $visitTest)
    {
        $visitTest->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
