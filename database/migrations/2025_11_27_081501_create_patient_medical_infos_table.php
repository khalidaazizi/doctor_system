<?php
// database/migrations/2024_01_01_create_patient_medical_infos_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientMedicalInfosTable extends Migration
{
    public function up()
    {
        Schema::create('patient_medical_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId("patient_id")->constrained("patients")->onDelete("cascade");
            $table->string('condition_name')->nullable();        // بیماری مزمن اصلی
            $table->text('condition_notes')->nullable();         // یادداشت‌های بیماری
            $table->enum('blood_type', [                         // گروه خونی
                'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'
            ])->nullable();
            $table->json('allergies')->nullable();               // الرژی‌ها (آرایه)
            $table->string('emergency_contact')->nullable();     // تماس اضطراری
            $table->timestamps();

            // هر بیمار فقط یک رکورد اطلاعات پزشکی
            $table->unique('patient_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('patient_medical_infos');
    }
}