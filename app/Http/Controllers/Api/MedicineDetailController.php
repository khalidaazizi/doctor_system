<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MedicineDetail;
use Illuminate\Http\Request;

class MedicineDetailController extends Controller
{
    public function index()
    {
        // با مرتب‌سازی و فیلتر
        $details = MedicineDetail::with('medicine')
            ->orderBy('created_at', 'desc')
            ->get();
        
        return response()->json($details);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'medicines_id' => 'required|exists:medicines,id',
            'packing' => 'required|string|max:100',
            'status' => 'required|in:Available,Not Available',
        ]);

        $detail = MedicineDetail::create($validated);
        return response()->json($detail->load('medicine'), 201);
    }

    public function show(MedicineDetail $medicineDetail)
    {
        return response()->json($medicineDetail->load('medicine'));
    }

    public function update(Request $request, MedicineDetail $medicineDetail)
    {
        $validated = $request->validate([
           'packing' => 'required|string|max:100',
           'status' => 'required|in:Available,Not Available',
        ]);

        $medicineDetail->update($validated);
        return response()->json($medicineDetail->load('medicine'));
    }

    public function destroy(MedicineDetail $medicineDetail)
    {
        $medicineDetail->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}