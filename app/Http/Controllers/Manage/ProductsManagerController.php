<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Bussinse;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductsManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


    }


    public function manage(Request $request)
    {



        return view('manage.product.manage-products',['type'=>$request["type"],'bussinse_username'=>$request['bussinse_username']]);

    //     $user=User::find(auth()->user()->id);
    //     $bussinses_ids=$user->bussinses()->whereHas("department",function($query){
    //     $query->where('type',"=",1);
    // })->pluck("id");


    // if($request["type"]=="all")
    // $peroducts=Product::where(function($query)use($user){
    //         $query->where('owner_id','=',$user->id)->where('owner_type','=',User::class);
    //     })
    //     ->Orwhere(function($query)use($bussinses_ids){
    //         $query->whereIn("owner_id",$bussinses_ids)->where('owner_type','=',Bussinse::class);
    //     })->orderBy('created_at','desc')->get();

    //     else if($request["type"]=="useronly")
    //     $peroducts=$user->products;


    //     else if($request["type"]=="bussinse" ){

    //     }









    //    return dd($peroducts);


        # code...
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
