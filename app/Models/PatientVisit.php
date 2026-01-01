<?php
// app/Models/PatientVisit.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientVisit extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function diseases()
    {
        return $this->belongsToMany(Disease::class, 'patient_visits_diseases', 'patient_visit_id', 'disease_id')
                    ->withTimestamps();
    }

    public function medications()
    {
        return $this->hasMany(PatientVisitsMedication::class, 'patient_visit_id')
                    ->with('medicineDetail.medicine');
    }

    public function tests()
    {
        return $this->belongsToMany(PatientLab::class, 'patient_visit_tests', 'patient_visit_id', 'test_id')
                    ->withTimestamps();
    }
}