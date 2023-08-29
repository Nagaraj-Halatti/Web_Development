<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;

class StudupcomingController extends Controller
{
    public function index()
    {  
        $events=event::all();
        return view('studupcoming', compact('events'));
    }
}
