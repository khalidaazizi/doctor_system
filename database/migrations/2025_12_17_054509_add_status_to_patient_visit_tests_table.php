<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('patient_visit_tests', function (Blueprint $table) {
        $table->json('test_result')->nullable()->after('test_id');
        $table->enum('status', ['pending', 'completed', 'cancelled'])
              ->default('pending')
              ->after('test_result');

    });
}

public function down()
{
    Schema::table('patient_visit_tests', function (Blueprint $table) {
        $table->dropColumn('status');
        $table->dropColumn('test_result');
    });
}

};
