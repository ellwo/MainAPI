<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.ad.ad-index-table');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.ad.ad-form-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'img'=>'required|string',
            'note'=>'string|max:150',
            'link'=>'required'
        ]);


        Ad::create([
            'img'=>$request['img'],
            'note'=>$request['note'],
            'link'=>$request['link'],
            'active'=>1

        ]);


        return redirect()->route('ad')->with('status','تم الحفظ بنجاح ');




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {

        return view('admin.ad.ad-edit',['ad'=>$ad]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ad $ad)
    {
        $this->validate($request,[
            'img'=>'required|string',
            'note'=>'string|max:150',
            'link'=>'required'
        ]);


        $ad->update([
            'img'=>$request['img'],
            'note'=>$request['note'],
            'link'=>$request['link'],
            'active'=>1

        ]);
        $ad->save();


        return redirect()->route('ad')->with('status','تم التعديل بنجاح ');


        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        //
    }
}
