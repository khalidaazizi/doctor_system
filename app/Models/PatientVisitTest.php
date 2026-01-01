<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientVisitTest extends Model
{
    /** @use HasFactory<\Database\Factories\PatientVisitTestFactory> */
    use HasFactory;


    protected $guarded=['id'];

    protected $casts = [
        'status' => 'string',
    ];

     protected static function booted()
    {
        static::saving(function ($test) {
            // اگر نتیجه پر شده باشد، status حتما باید 'completed' باشد
            if (!empty($test->test_result)) {
                $test->status = 'completed';
            } else {
                // اگر نتیجه خالی است و status 'completed' باشد، آن را روی 'pending' تنظیم می‌کنیم
                if ($test->status === 'completed') {
                    $test->status = 'pending';
                }
            }
        });
    }

    public function visit()
    {
        return $this->belongsTo(PatientVisit::class, 'patient_visit_id');
    }

    public function test()
    {
        return $this->belongsTo(PatientLab::class, 'test_id');
    }
}
