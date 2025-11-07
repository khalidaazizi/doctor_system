<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MedicineDetail;
use Illuminate\Http\Request;

class MedicineDetailController extends Controller
{
    public function index()
    {
        return response()->json(MedicineDetail::with('medicine')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'medicines_id' => 'required|exists:medicines,id',
            'packing' => 'required|string|max:40',
        ]);

        $detail = MedicineDetail::create($validated);
        return response()->json($detail, 201);
    }

    public function show(MedicineDetail $medicineDetail)
    {
        return response()->json($medicineDetail->load('medicine'));
    }

    public function update(Request $request, MedicineDetail $medicineDetail)
    {
        $validated = $request->validate([
            'packing' => 'sometimes|string|max:40',
        ]);

        $medicineDetail->update($validated);
        return response()->json($medicineDetail);
    }

    public function destroy(MedicineDetail $medicineDetail)
    {
        $medicineDetail->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
