<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Station;
use App\Models\Bus;
use App\Models\Blogs;
use App\Models\Route;
use App\Models\Service;
use Carbon\Carbon;


class FrontController extends Controller

{
    public function Services()
    {
        $clms[]=['img'=>'/images/bus.jpg','title'=>'TripHaven','title2'=>'We are available 24/7 ',
      ];
            $clms[]=['img'=>'images/bus4.jpg','title'=>'TripHaven','title2'=>'We are available 24/7'];
        $punctuality = DB::table('services')->where('heading', 'Punctuality')->first();
        $audioVisuals = DB::table('services')->where('heading', 'Audio/Visuals')->first();
        $service = Service::all();
        return view('Front.home', compact('punctuality', 'audioVisuals','service','clms'));
    }


public function about(){


    return view('Front.about');
}

public function contact(){


    return view('Front.contact');
}



public function booking()
{
    $cities=City::all();
    $stations=Station::all();
    $buses=Bus::all();
    $routes=Route::all();
    $minDate = Carbon::today()->toDateString(); // Today's date
    $maxDate = Carbon::today()->addDays(10)->toDateString(); // 10 days from today

    return view('Front.form', compact('cities', 'stations', 'buses', 'routes', 'minDate', 'maxDate'));
}


public function show(Request $request)
{
$blog=Blogs::all();
    return view('Front.home', compact('blog')) ;
}



}
