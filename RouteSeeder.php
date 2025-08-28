<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Route;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Route::create(['route_name' => 'GRW to LHR', 'station_id' => 1]);
        Route::create(['route_name' => 'GRW to SKT', 'station_id' => 2]);
        Route::create(['route_name' => 'GRW to FSD', 'station_id' => 3]);
        Route::create(['route_name' => 'GRW to RWP', 'station_id' => 4]);
        Route::create(['route_name' => 'GRW to ISB', 'station_id' => 5]);

    }
}
