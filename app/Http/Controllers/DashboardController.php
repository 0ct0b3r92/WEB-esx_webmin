<?php

namespace App\Http\Controllers;

use App\Players;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){

        $PlayersCount = Players::all()->count();
        $TownMoney = $this->getMoney();
        $CpuLoad = $this->getSystemLoad();
        $Players = User::orderBy('created_at','DESC')->limit(8);

        return view('home',compact('PlayersCount','TownMoney','CpuLoad','Players'));
    }
}
