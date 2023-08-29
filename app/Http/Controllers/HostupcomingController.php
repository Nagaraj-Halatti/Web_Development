<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
use Carbon\Carbon;
class HostupcomingController extends Controller
{
    public function index()
    {
        $current_date = Carbon::now()->toDateString();
        $current_time = Carbon::now()->toTimeString();
        $events1=event::all()->where('date','>',$current_date); $events=event::all()->Where('date','=',$current_date)->Where('time','>',$current_time)->union($events1);
        return view('hostupcoming', compact('events'));
    }  
}
