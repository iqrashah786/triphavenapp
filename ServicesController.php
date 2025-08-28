<?php
namespace App\Http\Controllers;
use App\Models\Service;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
class ServicesController extends Controller
{
    public function index(Request $request)
    { $service=Service::get();
        return view('Front.service.index', compact('service')) ;
    }
  public function create()
    {
    $service = new Service();
    return view('Front.service.create', compact('service'));
    }

public function store(Request $request)
{

$request->validate([
    'heading' => 'required|string|max:255',
    'description' => 'required|string',
    'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
]);



$service = Service::create([
    'heading' => $request->title,
    'description' => $request->description,
    'image' => $request->hasFile('image') ? $request->file('image')->store('images', 'public') : null,

]);


return redirect()->route('service.index')->with('success', 'Service created successfully.');
}

public function edit($id)
{
$service = Service::findOrFail($id);
return view('Front.service.create', compact('service'));
}

public function update(Request $request, $id)
{
$request->validate([
    'heading' => 'required|string|max:255',
    'description' => 'required|string',
    'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
]);

$service = Service::findOrFail($id);
$service->update([
    'heading' => $request->title,
    'description' => $request->description,
    'image' => $request->hasFile('image') ? $request->file('image')->store('images', 'public') : $service->image,
]);

return redirect()->route('service.index')->with('success', 'Service updated successfully.');
}

public function destroy($id)
{
$service = Service::findOrFail($id);
$service->delete();
return redirect()->route('service.index')->with('success', 'Service deleted successfully.');
}
public function showservice(Request $request)
{
    $service = Service::get();
    return view('Front.home', compact('service'));
}
}
