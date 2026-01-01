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
                $messages = [
            'phone_number.unique' => 'A patient with this phone number already exists.',
        ];

        $validated = $request->validate([
            'patients_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:0,1',
            'phone_number' => 'required|string|max:20|unique:patients,phone_number',
        ], $messages);

        $patient = Patient::create($validated);
        return response()->json($patient, 201);
    }

    public function show(Patient $patient)
    {
        return response()->json($patient);
    }

    public function update(Request $request, Patient $patient)
    {
                $messages = [
            'phone_number.unique' => 'A patient with this phone number already exists.',
        ];

        $validated = $request->validate([
            'patients_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:0,1',
            'phone_number' => 'required|string|max:20|unique:patients,phone_number',
        ], $messages);

        $patient->update($validated);
        return response()->json($patient);
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
