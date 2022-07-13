<?php

namespace App\Http\Controllers;

use App\Models\Bussinse;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SearchController extends Controller
{
    //


    public function index(Request $request)
    {
        # code...

       $products=Product::inRandomOrder()->take(7)->get();
       $service=Service::inRandomOrder()->take(7)->get();
        $bussinses=Bussinse::inRandomOrder()->take(4)->get();



        return view('search-pages.general-search-page',['bussinses'=>$bussinses,'services'=>$service,'products'=>$products]);
    }



    public function product_search(Request $request)
    {
        $dept=$request->has('dept')?$request['dept']:'any';
        return view('search-pages.product-search',['dept'=>$dept]);
    }
}
