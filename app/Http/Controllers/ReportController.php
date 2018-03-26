<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use App\Report;
use App\ReportType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = ReportType::all()->pluck('label', 'id');
        return view('Website.report',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReportRequest $request)
    {
        $isPosted = Report::where('name','LIKE', $request->name)->first();

        if(!$isPosted) {
            Report::create($request->all());
            $report_type = ReportType::where('id',$request->type_id)->first();
            $this->publishDiscord('staff', Auth::user()->username . ' a ' . $report_type->label, $request->title, Auth::user() , route('manager.index'));
        }

        return redirect(route('profile.index'))->with(['success' => 'Nous avons bien reçu votre rapport, un membre validera des que possible!']);
    }

}
