<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientVisitTest extends Model
{
    /** @use HasFactory<\Database\Factories\PatientVisitTestFactory> */
    use HasFactory;


    protected $guarded=['id'];

    
    public function visit()
    {
        return $this->belongsTo(PatientVisit::class, 'patient_visit_id');
    }

    public function test()
    {
        return $this->belongsTo(PatientLab::class, 'test_id');
    }
}
