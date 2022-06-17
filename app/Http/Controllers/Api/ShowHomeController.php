<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShowHomeController extends Controller
{
    //

    public function index(Request $request)
    {
        # code...

        $country=$request->has('country')? $request['country']:'';
        $city=$request->has('city') ?$request['city']:'';
        $parts=$request->has('parts')?$request['parts']:[];


        $products=Product::all();




    }
}
