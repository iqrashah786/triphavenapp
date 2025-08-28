<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('routes', function (Blueprint $table) {
            // Change 'fare' column to the correct data type
            $table->decimal('fare', 8, 2)->change(); // Example for a decimal type
        });
    }

    public function down()
    {
        Schema::table('routes', function (Blueprint $table) {
            // Revert to the previous type if needed
            $table->integer('fare')->change(); // Change back to the original type
        });
    }
};
