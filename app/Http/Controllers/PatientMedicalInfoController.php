<?php

namespace App\Http\Controllers;

use App\Models\PatientMedicalInfo;
use App\Http\Requests\StorePatientMedicalInfoRequest;
use App\Http\Requests\UpdatePatientMedicalInfoRequest;

class PatientMedicalInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientMedicalInfoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PatientMedicalInfo $patientMedicalInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PatientMedicalInfo $patientMedicalInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientMedicalInfoRequest $request, PatientMedicalInfo $patientMedicalInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PatientMedicalInfo $patientMedicalInfo)
    {
        //
    }
}
