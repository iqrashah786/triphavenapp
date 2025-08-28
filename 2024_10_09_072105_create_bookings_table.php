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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Assuming there's a users table
            $table->foreignId('route_id')->constrained('routes', 'route_id')->onDelete('cascade'); // Specify the referenced table aing this references the routes table
            $table->foreignId('station_id')->constrained()->onDelete('cascade'); // Assuming this references the stations table
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
