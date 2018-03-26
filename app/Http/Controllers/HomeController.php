<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $DiscordURL = '';
        return view('Website.home');
    }
}
