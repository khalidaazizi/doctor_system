<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patient_visits_medications', function (Blueprint $table) {
            $table->id();
             $table->foreignId("patient_visit_id")->constrained("patient_visits")->onDelete("cascade");
             $table->foreignId("medicines_detail_id")->constrained("medicine_details")->onDelete("cascade");
             $table->tinyInteger("quantity");
             $table->string("dosage",10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_visits_medications');
    }
};
