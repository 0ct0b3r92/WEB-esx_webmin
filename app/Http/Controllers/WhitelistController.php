<?php

namespace App\Http\Controllers;

use App\Http\Requests\WhitelistRequest;
use App\User;
use App\Whitelist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WhitelistController extends Controller
{
    public function index(){
        $Whitelists = Whitelist::all();
        return view($this->template . '.whitelist.index',compact('Whitelists'));
    }

    public function show($id){
        $Whitelist = Whitelist::findOrfail($id);
        return view($this->template . '.whitelist.validate',compact('Whitelist'));
    }


    public function create(){
        return view($this->template . ".whitelist.create", compact('Whitelist'));
    }

    public function valide(WhitelistRequest $request){

        $isPosted = Whitelist::where(['user_id' => Auth::user()->id])->first();

        if(!$isPosted) {
            $data = ['user_id' => Auth::user()->id];
            $Whitelisted = Whitelist::create(array_merge($data, $request->all()));
            $this->publishDiscord('Nouvelle demande de Whitelist publié!', $Whitelisted);
        }

        return redirect(route('home'))->with(['success' => 'Nous avons bien reçu votre candidature, un membre validera des que possible!']);

    }

    public function refuse(Request $request){

        $Member = User::where('id', $request->input('member'))->first();
        $Member->whitelisted = '0';
        $Member->save();
        Whitelist::where('user_id', $Member->id)->update(['status' => 2, 'admin_id' => $request->input('validationBy')]);

        $return = [
            'title' => "$Member->username a bien été refusé",
            'text' => "Ce membre doit maintenant refaire une candidature pour retanter sa chance"
        ];

        return json_encode($return);
    }

    public function accepted(Request $request){
        $Member = User::where('id', $request->input('member'))->first();
        $Member->whitelisted = '1';
        $Member->save();
        Whitelist::where('user_id', $Member->id)->update(['status' => 1, 'admin_id' => $request->input('validationBy')]);


        $return = [
            'title' => "$Member->username a bien été accepté",
            'text' => "Ce membre fait maintenant partie de notre fabuleuse liste de membre"
        ];
        return json_encode($return);
    }
}