<?php

namespace App\Http\Controllers;
use App\Models\Blogs;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
    class BlogController extends Controller
    {
        public function index(Request $request)
        { $blog=Blogs::get();
            return view('Front.blogs.index', compact('blog')) ; // Render the main view for non-AJAX requests
        }
      public function create()
        {
        $blog = new Blogs();
        return view('Front.blogs.create', compact('blog'));
        }

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);


    $blog = Blogs::create([
        'title' => $request->title,
        'description' => $request->description,
        'image' => $request->hasFile('image') ? $request->file('image')->store('images', 'public') : null,

    ]);

    return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
}

public function edit($id)
{
    $blog = Blogs::findOrFail($id);
    return view('Front.blogs.create', compact('blog'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $blog = Blogs::findOrFail($id);
    $blog->update([
        'title' => $request->title,
        'description' => $request->description,
        'image' => $request->hasFile('image') ? $request->file('image')->store('images', 'public') : $blog->image,
    ]);

    return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
}

public function destroy($id)
{
    $blog = Blogs::findOrFail($id);
    $blog->delete();
    return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
}

    }
