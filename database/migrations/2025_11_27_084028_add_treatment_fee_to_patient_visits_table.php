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
        
    Schema::table('patient_visits', function (Blueprint $table) {
         $table->integer('treatment_fee')->after('status');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::table('patient_visits', function (Blueprint $table) {
        $table->dropColumn('treatment_fee');
    });
    }
};
