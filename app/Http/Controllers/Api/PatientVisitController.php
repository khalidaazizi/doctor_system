<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PatientVisit;
use Illuminate\Http\Request;

class PatientVisitController extends Controller
{
    /**
     * List all patient visits
     */
    public function index()
    {
        return response()->json(PatientVisit::with('patient')->latest()->get());
    }

    /**
     * Store a new patient visit (appointment)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'visit_date' => 'required|date',
            'next_visit_date'=> 'date',
            'visit_time' => 'required',
            'bp' => 'nullable|string|max:10',
            'weight' => 'nullable|string|max:10',
            'status' => 'required|in:scheduled,completed,cancelled',
            'visit_type' => 'required|in:checkup,follow-up,emergency,consultation',
            'note' => 'nullable|string',
            'treatment_fee' => 'required|numeric|min:1',
        ]);

        // Check for duplicate appointment at the same date & time
        $exists = PatientVisit::where('visit_date', $validated['visit_date'])
            ->where('visit_time', $validated['visit_time'])
            ->exists();

        if ($exists) {
            return response()->json([
                'message' => 'An appointment already exists at this date and time.'
            ], 422);
        }

        // Create the visit
        $visit = PatientVisit::create($validated);

        return response()->json($visit, 201);
    }

    /**
     * Show a single patient visit
     */
    public function show(PatientVisit $visit)
    {
        return response()->json($visit->load('patient'));
    }

    /**
     * Update a patient visit
     */
    public function update(Request $request, PatientVisit $visit)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'visit_date' => 'required|date',
            'next_visit_date'=> 'date',
            'visit_time' => 'required',
            'bp' => 'nullable|string|max:10',
            'weight' => 'nullable|string|max:10',
            'status' => 'required|in:scheduled,completed,cancelled',
            'visit_type' => 'required|in:checkup,follow-up,emergency,consultation',
            'note' => 'nullable|string',
            'treatment_fee' => 'required|numeric|min:1',
        ]);

        // Check for duplicate appointment on update (exclude current record)
        $exists = PatientVisit::where('visit_date', $validated['visit_date'])
            ->where('visit_time', $validated['visit_time'])
            ->where('id', '!=', $visit->id)
            ->exists();

        if ($exists) {
            return response()->json([
                'message' => 'An appointment already exists at this date and time.'
            ], 422);
        }

        $visit->update($validated);

        return response()->json($visit);
    }

    /**
     * Delete a patient visit
     */
    public function destroy(PatientVisit $visit)
    {
        $visit->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
