<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    /** @use HasFactory<\Database\Factories\PatientFactory> */
    use HasFactory;
    protected $guarded=['id'];

    public function visits()
    {
        return $this->hasMany(PatientVisit::class, 'patient_id');
    }

    public function chronicConditions()
    {
        return $this->hasMany(PatientChronicCondition::class, 'patient_id');
    }
     public function medicalInfo()
    {
        return $this->hasOne(PatientMedicalInfo::class, 'patient_id');
    }
}
