<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class hostregisterController extends Controller
{
    public function index()
    {
        return view('hostregister');
    }
    
    public function store(Request $request)
    {
        try{
        $request->validate([
            'name' => 'required|max:15',
            'email' => 'required|unique:users|max:45',
            'branch' => 'required',
            'mobile' => 'required',
            'password' => 'required|min:6|same:password_confirmation',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->branch = $request->branch;
        $user->role = $request->role;
        $user->sem = $request->sem;
        $user->usn = $request->usn;
        $user->status = $request->status;
        $user->verify = $request->verify;
        $user->password = Hash::make($request->password);

        $user->save();
        return redirect()->route('studlogin');
        // return response()->json(['success' => 'User created successfully.']);
    }
        
        
        catch (Throwable $e){
            dd($e);
        }}
}
