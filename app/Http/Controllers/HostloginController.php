<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HostloginController extends Controller
{
     public function index()
    {
        return view('hostlogin');
    }
    public function store(Request $request)
    {
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
             if(Auth::user()->role == '2'){
                return redirect()->route('aboutus');
            }else{
                return redirect()->route('studlogin');
            }
        }
        return redirect()->route('home');

    }
}
