<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
class EventcreateController extends Controller
{
    public function index()
    {
        $categories=category::all();
        return view('eventcreate',compact('categories'));
    }
}
