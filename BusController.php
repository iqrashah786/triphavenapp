<?php

// app/Http/Controllers/BusController.php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Station;
use App\Models\Route;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BusController extends Controller
{
    public function index(Request $request)
    {
        $bus=Bus::all();
        return view('admin.bus.index', compact('bus')) ;


        // return view('Admin.bus.index');

    }

    public function store(Request $re) {

        bus::create($re->all());

        return redirect()->route('bus.index');

    }

        public function create() {

            $bus=new Bus ();

            return view('admin.bus.create',compact('bus'));

        }

        public function edit($id) {
            $bus=Bus::find($id);
            if (!$bus) {
                return redirect()->route('bus.index')->with('error', 'Bus not found.');
            }
            return view('admin.bus.create',compact('bus'));

        }
        public function update(Request $re,$id) {
            $bus=Bus::find($id);
            if (!$bus) {

                return redirect()->route('bus.index')->with('error', 'Bus not found.');
            }

            $bus->update($re->all());

            return redirect()->route('bus.index');
        }
        public function destroy($id) {

            $bus=Bus::find($id);
            $bus->delete();

            return redirect()->route('bus.index');

        }
     

    }









