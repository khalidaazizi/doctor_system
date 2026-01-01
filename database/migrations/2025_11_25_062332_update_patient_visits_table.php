<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('patient_visits', function (Blueprint $table) {
            $table->date('next_visit_date')->nullable()->after('visit_date'); // new add 
            $table->time('visit_time')->after('next_visit_date'); 
            $table->enum('status', ['scheduled', 'completed', 'cancelled'])
                  ->default('scheduled')
                  ->after('weight');
            $table->enum('visit_type', ['checkup', 'follow-up', 'emergency', 'consultation'])
                  ->nullable()
                  ->after('status');
            $table->text('note')->nullable()->after('visit_type');
        });
    }

    public function down(): void
    {
        Schema::table('patient_visits', function (Blueprint $table) {
            $table->dropColumn(['visit_time', 'next_visit_date' , 'status', 'visit_type', 'note']);
        });
    }
};

