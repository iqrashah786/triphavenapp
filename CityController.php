<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\Station;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CityController extends Controller
{
    public function index(Request $request)
    {

        $city =City::all();

        return view('Admin.city.index',compact('city'));
}
public function create() {

    $city=new City();

    return view('admin.city.create',compact('city'));

}


public function store(Request $re) {

    city::create($re->all());

    return redirect()->route('city.index');

}


public function edit($id) {
    $city=City::find($id);
    return view('admin.city.create',compact('city'));

}
public function update(Request $re,$id) {
    $city=City::find($id);
    $city->update($re->all());

    return redirect()->route('city.index');
}

public function destroy($id) {
    $city = City::find($id);
    foreach ($city->stations as $station) {
        $station->routes()->delete();
    }


    $city->stations()->delete();
    $city->delete();

    return redirect()->route('city.index')->with('success', 'City deleted successfully.');
}



public function getStations($cityId){

   if (!$cityId) {
       return response()->json(['error' => 'City not found'], 404);
   }


   $stations = Station::where('city_id', $cityId)->pluck('name', 'id');
   return response()->json(['stations' => $stations]);
}

}

