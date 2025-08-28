<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
  public function index(Request $request)
  {

return view('weather');
}
  public function Gujranwala(Request $request)
  {

return view('Gujranwala');
}
 public function Lahore(Request $request)
  {

return view('Lahore');
}
public function sialkot(Request $request)
  {

return view('sialkot');
}
public function faisalabad(Request $request)
  {

return view('faisalabad');
}
public function jhelum(Request $request)
  {

return view('jhelum');
}
public function gujrat(Request $request)
  {

return view('gujrat');
}

public function islamabad(Request $request)
  {

return view('islamabad');
}
public function bahawalpur(Request $request)
  {

return view('Bahawalpur');
}
public function ghakhar(Request $request)
  {

return view('ghakhar');
}


}
