<?php

namespace App\Http\Controllers;
use App\Models\Route;
use App\Models\Station;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class StationController extends Controller
{
    public function index(Request $request)
    {
        $station =Station::get();
        return view('admin.station.index',compact('station'));
}
public function store(Request $request) {

    Station::create($request->all());

    return redirect()->route('station.index');

}
public function create() {

    $station=new Station();

    return view('admin.station.create',compact('station'));

}
public function edit($id) {
    $station=Station::find($id);
    return view('admin.station.create',compact('station'));

}
public function update(Request $re,$id) {
    $station=Station::find($id);
    $station->update($re->all());

    return redirect()->route('station.index');
}
public function destroy($id) {
    $station = Station::find($id);

   $station->routes()->delete();
    $station->delete();

    return redirect()->route('station.index')->with('success', 'Station deleted successfully.');
}


    public function getRoutes($stationId){

        $routes = Route::where('station_id',$stationId )->pluck('route_name', 'route_id');

        if (!$routes) {
            return response()->json(['error' => 'Routes not found'], 404);
        }

        return response()->json(['routes' => $routes]);
     }

}

