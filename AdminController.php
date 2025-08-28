<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use DB;
use Illuminate\Http\Request;
use App\Models\Service;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index1()
    {
        $clms[] = ['img' => '/images/bus.jpg', 'title' => 'TrpHaven', 'title2' => 'We are available 24/7'];
        $clms[] = ['img' => 'images/bus4.jpg', 'title' => 'TripHaven', 'title2' => 'We are available 24/7'];

        $punctuality = DB::table('services')->where('heading', 'Punctuality')->first();
        $audioVisuals = DB::table('services')->where('heading', 'Audio/Visuals')->first();
        $service = Service::all();

        return view('Front.home', compact('punctuality', 'audioVisuals', 'service', 'clms'));
    }

    public function index(){
        if(Gate::allows('is_admin'))
        {
            return view('Admin.master');
        }
        else
        {
            abort('401');
        }
    }





}



