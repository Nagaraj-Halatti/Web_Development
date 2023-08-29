<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
use App\Models\user;
use App\Models\participator;

class participatorController extends Controller
{
    public function update(Request $request)
    {

            
            User::find($request->user_id)->update($request->all());
            $user = new participator();
            $user->event_id = $request->event_id;
            $user->user_id = $request->user_id;
            $user->save();
            return redirect()->route('allevents');
            // return response()->json(['success' => 'User created successfully.']);
        
        
        
    }
}
