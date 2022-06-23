<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //

    public function index(Request $request)
    {











        $leftService=visits(Service::class)->top(6);

        $right_Service=Service::withAvg('ratings:value')->orderByRelation('ratings:value', 'desc', 'avg')->take(4)->get();


       $leftproducts=visits(Product::class)->top(6);

       $right_product=Product::withAvg('ratings:value')->orderByRelation('ratings:value', 'desc', 'avg')->take(4)->get();



        return view('jj',['l_service'=>$leftService,'r_service'=>$right_Service,'l_products'=>$leftproducts,'r_products'=>$right_product]);
        # code...
    }
}
