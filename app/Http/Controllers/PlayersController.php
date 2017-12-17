<?php

namespace App\Http\Controllers;

use App\Players;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    public function index(){
        $Players = Players::all();

        return view('players',compact('Players'));
    }
}
