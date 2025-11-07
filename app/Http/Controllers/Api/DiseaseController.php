<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Disease;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    public function index()
    {
        return response()->json(Disease::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'disease_name' => 'required|string|max:300',
        ]);

        $disease = Disease::create($validated);
        return response()->json($disease, 201);
    }

    public function show(Disease $disease)
    {
        return response()->json($disease);
    }

    public function update(Request $request, Disease $disease)
    {
        $validated = $request->validate([
            'disease_name' => 'sometimes|string|max:300',
        ]);

        $disease->update($validated);
        return response()->json($disease);
    }

    public function destroy(Disease $disease)
    {
        $disease->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
