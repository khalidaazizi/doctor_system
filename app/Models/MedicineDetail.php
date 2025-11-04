<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineDetail extends Model
{
    /** @use HasFactory<\Database\Factories\MedicineDetailFactory> */
    use HasFactory;

    protected $guarded=['id'];

    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'medicines_id');
    }

    public function patientMedications()
    {
        return $this->hasMany(PatientVisitsMedication::class, 'medicines_detail_id');
    }
}
