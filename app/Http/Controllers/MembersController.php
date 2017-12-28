<?php

namespace App\Http\Controllers;


use App\Http\Requests\WhitelistRequest;
use App\User;
use App\Whitelist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MembersController extends Controller
{
    public function index(){
        $Members = User::orderBy('created_at','DESC')->get();
        return view($this->template . '.members.index2',compact('Members'));
    }


    public function joins(){
        return view($this->template . '.whitelist.create');
    }


    public function profile($id){

        if($id != null) {
            $Member = User::find($id);
        }else{
            $Member = Auth::user();
        }
        return view($this->template . '.members.profile',compact('Member'));
    }
}
