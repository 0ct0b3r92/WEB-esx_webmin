<?php

namespace App\Http\Controllers\Manager;

use App\User;
use App\Whitelist;
use Illuminate\Http\Request;

class MemberController
{
    public function index(){
        $Members = User::with('StatusWL')->get();
        return view('Manager.members.index',compact('Members'));
    }

}
