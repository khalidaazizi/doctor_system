<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientLab extends Model
{
    /** @use HasFactory<\Database\Factories\PatientLabFactory> */
    use HasFactory;

    protected $guarded=['id'];

    
    public function visits()
    {
        return $this->belongsToMany(PatientVisit::class, 'patient_visit_tests', 'test_id', 'patient_visit_id');
    }
}
