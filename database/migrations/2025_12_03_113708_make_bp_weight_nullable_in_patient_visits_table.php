<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('patient_visits', function (Blueprint $table) {
            $table->string('bp', 10)->nullable()->change();
            $table->string('weight', 10)->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('patient_visits', function (Blueprint $table) {
            $table->string('bp', 10)->nullable(false)->change();
            $table->string('weight', 10)->nullable(false)->change();
        });
    }
};
