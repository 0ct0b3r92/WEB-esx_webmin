<?php

namespace App\Http\Controllers\Manager;

use App\Fivem\AccountData;
use App\Fivem\Billing;
use App\Fivem\Job;
use App\Fivem\Player;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(){
        $Jobs = Job::with('Players')->get();
        return view('Manager.Jobs.index',compact('Jobs'));
    }


    public function show($name){
        $Job = Job::where('name',$name)->with('Players')->first();
        $Bank = AccountData::where('account_name','=', "society_".$Job->name)->first();
        $Job->Boss = Player::where('job', $name)->where('job_grade','4')->Orwhere('job_grade','3')->first();
        $Job->Invoices = Billing::with('To')->with('By')->where('target','=', "society_".$Job->name)->get();
        $Job->Bank = isset($Bank) ? "$".number_format($Bank->money, 2, ',', ' ') : "Aucun compte";
        return view('Manager.Jobs.show',compact('Job'));
    }
}
