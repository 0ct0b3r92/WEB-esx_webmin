<?php

namespace App\Http\Controllers;

use App\Players;
use App\User;
use App\Whitelist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index(){
        $Whitelist = Whitelist::where('user_id', Auth::user()->id)->first();

        if(Auth::user()->whitelisted){
            $Member = Auth::user();
            return view($this->template . '.members.profile', compact('Member'));
        }elseif($Whitelist){
            return view($this->template . '.whitelist.validate',compact('Whitelist'));
        }else{
            return view($this->template . '.whitelist.create');
        }
    }


}
