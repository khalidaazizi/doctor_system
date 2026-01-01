<?php
// app/Models/PatientMedicalInfo.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientMedicalInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'condition_name',      // نام بیماری مزمن
        'condition_notes',     // یادداشت‌های بیماری
        'blood_type',          // گروه خونی
        'allergies',           // الرژی‌ها
        'emergency_contact',   // تماس اضطراری
    ];

    protected $casts = [
        'allergies' => 'array' // ذخیره الرژی‌ها به صورت آرایه
    ];

    // گروه‌های خونی معتبر
    const BLOOD_TYPES = [
        'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}