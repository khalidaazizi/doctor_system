<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientVisitsMedication extends Model
{
    /** @use HasFactory<\Database\Factories\PatientVisitsMedicationFactory> */
    use HasFactory;


    protected $guarded=['id'];


    public function visit()
    {
        return $this->belongsTo(PatientVisit::class, 'patient_visit_id');
    }

    public function medicineDetail()
    {
        return $this->belongsTo(MedicineDetail::class, 'medicines_detail_id');
    }
}
