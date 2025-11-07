<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;


class PatientController extends Controller
{
    public function index()
    {
        return response()->json(Patient::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patients_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:0,1',
            'phone_number' => 'nullable|string|max:20',
        ]);

        $patient = Patient::create($validated);
        return response()->json($patient, 201);
    }

    public function show(Patient $patient)
    {
        return response()->json($patient);
    }

    public function update(Request $request, Patient $patient)
    {
        $validated = $request->validate([
            'patients_name' => 'sometimes|string|max:255',
            'date_of_birth' => 'sometimes|date',
            'gender' => 'sometimes|in:0,1',
            'phone_number' => 'nullable|string|max:20',
        ]);

        $patient->update($validated);
        return response()->json($patient);
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
