<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


            $stations = [
                ['name' => 'Station Alpha', 'city_id' => 1],
                ['name' => 'Station Beta', 'city_id' => 2],
                ['name' => 'Station Gamma', 'city_id' => 3],
                ['name' => 'Station Delta', 'city_id' => 4],
                ['name' => 'Station Epsilon', 'city_id' => 5],
            ];

          
            foreach ($stations as $station) {
                DB::table('stations')->insert($station);
            }
        }
    }

