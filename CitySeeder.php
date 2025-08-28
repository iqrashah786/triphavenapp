<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    public function run()
    {
     
        City::create(['name' => 'Gujranwala']);
        City::create(['name' => 'Lahore']);
        City::create(['name' => 'Sialkot']);
        City::create(['name' => 'Sarghoda']);
        City::create(['name' => 'Gujrat']);
    }
}
