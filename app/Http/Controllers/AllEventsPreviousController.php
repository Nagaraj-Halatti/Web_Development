<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AllEventsPreviousController extends Controller
{
    public function index()
    {
        return view('allprev');
    }
}
