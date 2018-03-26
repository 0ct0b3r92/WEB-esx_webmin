<?php

namespace App\Http\Controllers\Manager;

use App\Fivem\Job;
use App\Fivem\Player;
use App\Http\Controllers\Controller;
use App\Settings;
use App\User;
use App\Whitelist;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('isAdmin');
    }

    public function index(){
        $Players  = User::orderBy('created_at','DESC');
        $Business = Job::all()->count();
        $Economy = number_format(Player::sum('bank'), 2, '.', ',');
        $Whitelists = Whitelist::limit(4)->orderBy('id','DESC')->with('Member')->get();
        return view('Manager.home.index',compact("Economy",'Business','Players','Whitelists'));
    }


    public function settings(){
        $Settings = Settings::first();
        return view("Manager.settings",compact('Settings'));
    }


    public function saveSettings(Request $request){
        $this->publishDiscord('general','New Application','teste Username Webhook');
        Settings::orderBy('id','DESC')->first()->update($request->all());
        return redirect(route('manager.settings'))->with(['success' => 'Vos modifications ont bien été enregistré!']);
    }
}
