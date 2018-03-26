<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $Events = null;

        return view('Website.Events.index',compact('Events'));
    }
}
