<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Part;
use Illuminate\Http\Request;

class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $d = Department::all();
        $part = Part::all();
        return view("admene.Parts.addd" , compact('part','d'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:parts,name|string',
        ]);
        $this->validate($request,[
            'note'=>'required|unique:parts,note|string',
        ]);
        $departments = Department::find($request->department_id);
        $part = new Part();
        $part->name = $request->name;
        $part->note = $request->note;
        $departments->parts()->save($part);
        return redirect()->back();
    }
    public function delete($id)
    {
        $flight = Part::find($id);
        $flight->delete();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function show(Part $part)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $d = Department::all();
        $part = Part::find($id);
        return view("admene.Parts.update" ,compact('part','d'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name'=>'required|unique:cities,name|string',
         ]);
         $this->validate($request,[
            'note'=>'required|unique:parts,note|string',
        ]);
         $departments = Department::find($request->department_id);
         $part = Part::find($id);
         $part->name = $request->name;
         $part->note = $request->note;
         $departments->parts()->save($part);
         return redirect()->route('show_Parts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function destroy(Part $part)
    {
        //
    }
}
