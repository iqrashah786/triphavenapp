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
        Schema::table('routes', function (Blueprint $table) {
            $table->time('time');
            $table->dropColumn('date');
        });
    }

    
    public function down(): void
    {
        Schema::table('routes', function (Blueprint $table) {
            //
        });
    }
};
