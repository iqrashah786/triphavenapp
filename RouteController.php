<?php
namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Station;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class RouteController extends Controller
{
    public function index(Request $request)
    {
        $route = Route::with('station')->get();
        return view('Admin.route.index',compact('route'));


}

public function create() {

    $route=new Route();

    return view('admin.route.create',compact('route'));

}

public function store(Request $re) {

    Route::create($re->all());

    return redirect()->route('route.index');

}

public function edit($id) {

    $route=Route::find($id);

    return view('admin.route.create',compact('route'));

}
public function update(Request $re,$id) {
    $route=Route::find($id);
    $route->update($re->all());

    return redirect()->route('route.index');
}
public function destroy($id) {

    $route=Route::find($id);
    $route->delete();

    return redirect()->route('route.index');

}
public function amountfare(Request $request)
{

    $fares = Route::where('route_id',$request->route_id )->first();
    // return $fares;
    return view('Front.fare', compact('fares'));
}
public function date(Request $request)
{

    $date = Route::where('route_id',$request->route_id )->first();

    return view('Front.fare', compact('date'));
}
public function time(Request $request)
{

    $time = Route::where('route_id',$request->route_id )->first();

    return view('Front.fare', compact('time'));
}

}
