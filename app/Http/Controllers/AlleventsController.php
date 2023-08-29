<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
use App\Models\user;
use Carbon\Carbon;
use DB;
use App\Models\participator;

class AlleventsController extends Controller
{
    public function index() 
    {
        $events=event::all();
        return view('allevents', compact('events'));
    }
    public function register($id,$user_id) 
    {

        $unique_id=DB::table('participators')->select('id')->where('event_id',$id)->where('user_id',$user_id )->get();
     
        
        if($unique_id=='[]'){
            $event_id=$id;
        return view('eventregister' ,compact('event_id'));
        }
        else 
        return redirect()->route('studupcoming');
    }
    public function store(Request $request)
    {

            $request->validate([
                'event_name' => 'required|max:15',
                'cat_id' => 'required',
                'date' => 'required',
                'time' => 'required',
                'venue' => 'required', 
                'desc' => 'required',
                'img'=>'required'
            ]);
    
            $user = new event();
            $user->event_name = $request->event_name;
            $user->cat_id = $request->cat_id;
            $user->user_id = $request->user_id;
            $user->date = $request->date;
            $user->time = $request->time;
            $user->venue = $request->venue;
            $user->desc = $request->desc;
            $user->status = $request->status;
            if($request->hasFile('img')){
                $request->img->store('uploads', 'public');
                $user->img = $request->img->hashName();
            }
    
            $user->save();
            return redirect()->route('hostupcoming');
            // return response()->json(['success' => 'User created successfully.']);
        
        
        
    }
    
}
