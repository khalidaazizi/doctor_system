<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    /** @use HasFactory<\Database\Factories\DiseaseFactory> */
    use HasFactory;

    protected $guarded = ['id'];


    public function visits()
    {
        return $this->belongsToMany(PatientVisit::class, 'patient_visits_diseases', 'disease_id', 'patient_visit_id');
    }
}
