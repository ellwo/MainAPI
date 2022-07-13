<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Markt;
use Illuminate\Http\Request;

class MarktsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $markts = Markt::all();
        $city = City::all();
        return view("admene.markts.addd" , compact('markts','city'));
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
            'name'=>'required|unique:markts,name|string',
        ]);
        $this->validate($request,[
            'land'=>'required|unique:markts,land_map|string',
        ]);
        $this->validate($request,[
            'long'=>'required|unique:markts,long_map|string',
        ]);
        $co = City::find($request->city_id);
        $markt = new Markt();
        $markt->name = $request->name;
        $markt->land_map = $request->land;
        $markt->long_map = $request->long;
        $co->markts()->save($markt);
        return redirect()->back();
    }

    public function delete($id)
    {
        $flight = Markt::find($id);
        $flight->delete();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $markts = Markt::find($id);
        $city = City::all();
        return view("admene.markts.update" , compact('markts','city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name'=>'required|unique:markts,name|string',
        ]);
        $this->validate($request,[
            'land'=>'required|unique:markts,land_map|string',
        ]);
        $this->validate($request,[
            'long'=>'required|unique:markts,long_map|string',
        ]);

        $co = City::find($request->city_id);
        $markt = Markt::find($id);;
        $markt->name = $request->name;
        $markt->land_map = $request->land;
        $markt->long_map = $request->long;
        $co->markts()->save($markt);
         return redirect()->route('show_markts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
