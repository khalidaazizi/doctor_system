<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PatientLab;
use Illuminate\Http\Request;

class PatientLabController extends Controller
{
    public function index()
    {
        return response()->json(PatientLab::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'test_name' => 'required|string|max:255',
        ]);

        $lab = PatientLab::create($validated);
        return response()->json($lab, 201);
    }

    public function show(PatientLab $lab)
    {
        return response()->json($lab);
    }

    public function update(Request $request, PatientLab $lab)
    {
        $validated = $request->validate([
            'test_name' => 'sometimes|string|max:255',
        ]);

        $lab->update($validated);
        return response()->json($lab);
    }

    public function destroy(PatientLab $lab)
    {
        $lab->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
