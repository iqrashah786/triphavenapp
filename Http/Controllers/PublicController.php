<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Service;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function show(Request $request)
    {
        $blog = Blogs::get();
        return view('Front.blogs', compact('blog'));
    }
   
}
