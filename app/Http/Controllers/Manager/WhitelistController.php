<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Whitelist;
use Illuminate\Http\Request;

class WhitelistController extends Controller
{
    public function index(){
        $Whitelists = Whitelist::with('Member')->with('Staff')->get();
        return view('Manager.whitelist.index',compact('Whitelists'));
    }

    public function show($id){
        $Whitelist = Whitelist::with('Member')->find($id);
        return view('Manager.whitelist.show',compact('Whitelist'));
    }
}
