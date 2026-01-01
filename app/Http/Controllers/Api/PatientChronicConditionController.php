<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PatientChronicCondition;
use Illuminate\Http\Request;

class PatientChronicConditionController extends Controller
{
    public function index()
    {
        return response()->json(PatientChronicCondition::with('patient')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'condition_name' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $condition = PatientChronicCondition::create($validated);
        return response()->json($condition, 201);
    }

    public function show(PatientChronicCondition $condition)
    {
        return response()->json($condition->load('patient'));
    }

    public function update(Request $request, PatientChronicCondition $condition)
    {
        $validated = $request->validate([
            'condition_name' => 'sometimes|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $condition->update($validated);
        return response()->json($condition);
    }

    public function destroy(PatientChronicCondition $condition)
    {
        $condition->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
