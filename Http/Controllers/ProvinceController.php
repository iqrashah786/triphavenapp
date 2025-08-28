<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;

class ProvinceController extends Controller
{
    public function index() {

        $provinces=Province::get();

        return view('admin.province.index',compact('provinces'));

    }

    public function create() {

        $province=new province();
        $countries = Country::all();


        return view('admin.province.create',compact('province','countries'));

    }

    public function store(Request $re) {

        Province::create($re->all());

        return redirect()->route('province.index');

    }

    public function edit($id) {
    
        $province=Province::find($id);


        return view('admin.province.create',compact('province'));

    }

    public function update(Request $re,$id) {

        $province=Province::find($id);
        $province->update($re->all());

        return redirect()->route('province.index');

    }

    public function destroy($id) {

        $province=Province::find($id);
        $province->delete();

        return redirect()->route('province.index');

    }

}
