<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientVisitsDisease extends Model
{
    /** @use HasFactory<\Database\Factories\PatientVisitsDiseaseFactory> */
    use HasFactory;

    protected $guarded=['id'];

    public function visit()
    {
        return $this->belongsTo(PatientVisit::class, 'patient_visit_id');
    }

    public function disease()
    {
        return $this->belongsTo(Disease::class, 'disease_id');
    }
}
