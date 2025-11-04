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
        Schema::create('patient_visit_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId("patient_visit_id")->constrained("patient_visits")->onDelete("cascade");
            $table->foreignId("test_id")->constrained("patient_labs")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_visit_tests');
    }
};
