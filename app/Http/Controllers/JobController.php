<?php

namespace App\Http\Controllers;

use App\Fivem\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(){
        $Jobs = Job::where('id','!=','1')->orderBy('name','ASC')->with('Players')->get();
        return view('Website.Jobs.index',compact('Jobs'));
    }

    public function show($job){
        $job = Job::where('name',$job)->with('Boss')->first();
        return view('Website.Jobs.show',compact('job'));
    }
}
