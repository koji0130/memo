<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopController extends Controller
{
    public function show(){
        return view('dashboard');
    }
    public function test(){
        return view('top.test');
    }
    public function top(){
        return view('top.top');
    }
}
