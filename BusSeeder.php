<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $buses = [
            ['license_plate' => 'ABC123', 'station_id' => 1],
            ['license_plate' => 'XYZ456', 'station_id' => 2],
            ['license_plate' => 'LMN789', 'station_id' => 3],
            ['license_plate' => 'PQR012', 'station_id' => 4],
            ['license_plate' => 'STU345', 'station_id' => 5],
        ];

        
        foreach ($buses as $bus) {
            DB::table('buses')->insert($bus);
        }
    }
}

