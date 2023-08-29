<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\event;

class CategoryController extends Controller
{
    public function index(){
        $categories = category::all();
        // $posts = Post::where('category', 'mat')->get();

        return view('admin.dash', ['categories' => $categories]);
    }
    public function index2(){
        $events = event::all();
        // $posts = Post::where('category', 'mat')->get();

        return view('admin.events', ['events' => $events]);
    }
    public function index3(){
        $events = event::all();
        // $posts = Post::where('category', 'mat')->get();

        return view('admin.events', ['events' => $events]);
    }
    public function store(Request $request){
        $validate = $request->validate([
            'cat_name' => "required|unique:categories",
        ]);
        $category = category::create($request->all());

        return redirect()->route('admin.dash');
    }

}
