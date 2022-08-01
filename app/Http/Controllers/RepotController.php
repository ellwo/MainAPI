<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class RepotController extends Controller
{
    //



    public function create(Request $request)
    {

        $reportable_id=$request['reportable_id'];
        $reportable_type=$request['reportable_type'];

        if($reportable_id!=null && $reportable_type!=null)
        return view('report-form',['reportable_id'=>$reportable_id,'reportable_type'=>$reportable_type]);
        else
        return abort(404);
        # code...
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'type'=>'required',
            'reportable_id'=>'required|numeric',
            'reportable_type'=>'required|string'
        ]);


        $repot=Report::create([


            'note'=>$request['note'],
            'type'=>$request['type'],
            'reportable_type'=>$request['reportable_type'],
            'reportable_id'=>$request['reportable_id'],

        ]);



        return redirect()->route('home');



        # code...
    }




}
