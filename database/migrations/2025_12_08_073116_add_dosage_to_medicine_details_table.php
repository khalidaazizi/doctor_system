<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('medicine_details', function (Blueprint $table) {
            
            $table->enum('status', ['Available', 'Not Available'])->after('packing');
        });
    }

    public function down(): void
    {
        Schema::table('medicine_details', function (Blueprint $table) {
            $table->dropColumn( 'status');
        });
    }
};