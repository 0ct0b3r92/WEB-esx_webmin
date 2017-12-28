<?php

namespace App\Http\Controllers;

use App\BugComment;
use App\BugTracker;
use App\BugType;
use Illuminate\Http\Request;

class BugTrackerController extends Controller
{
    public function index(){
        $Bugs = BugTracker::all();
        return view($this->template . '.tracker.index',compact('Bugs'));
    }

    public function show($categories,$id){
        $Bug = BugTracker::findOrfail($id);
        return view($this->template . '.tracker.show',compact('Bug'));
    }

    public function comment(Request $request,$categoty,$tracker_id){
        BugComment::create($request->all());
        return redirect()->back();
    }

    public function create(){
        $Type = BugType::all();
        return view($this->template . '.tracker.create',compact('Type'));
    }

    public function confirm(Request $request){
        dd($request->all());
        return view($this->template . '.tracker.create',compact('Type'));
    }
}
