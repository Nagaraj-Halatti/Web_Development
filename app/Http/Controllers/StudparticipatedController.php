<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\participator;
use App\Models\event;
use DB;

class StudparticipatedController extends Controller
{
    public function index($id)
    {
        $ids=DB::table('participators')->select('event_id')->where('user_id',$id)->get();
        $document=array();
         foreach($ids as $id){
              array_push($document,"$id->event_id");
            
         }
       
      
        $events=DB::table('events')->select('*')->whereIn('id',$document)->get();
        
        return view('studparticipated',compact('events'));
    }
}
