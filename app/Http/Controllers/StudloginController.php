<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class StudloginController extends Controller
{
    public function index()
    {
        return view('studlogin');
    }

    public function store(Request $request)
    {
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
             if(Auth::user()->role == '3'){
               

                return redirect()->route('studupcoming');
            }
             else if(Auth::user()->role == '2'){
                return redirect()->route('hostupcoming');
            }else{
                return redirect()->route('aboutus');
            }
        }
        return redirect()->route('home');

    }
    public function logout(){
        auth()->logout();
       return view('studlogin');
    }
}

