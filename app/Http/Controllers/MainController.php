<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Bussinse;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MainController extends Controller
{
    //

    public function index(Request $request)
    {











       $ads=Ad::all();



        $leftService=visits(Service::class)->top(6);
$right_Service=Service::with('owner')
->withAvg('ratings:value')
->withCount('ratings')
->orderByRelation('ratings:value', 'desc', 'avg')->take(4)->get();
$leftproducts=visits(Product::class)->top(6);




       $leftproducts=Product::with('owner')->withAvg('ratings:value')->withCount('ratings')->orderBy('updated_at','desc')->skip(1)->take(6)->get();

       $leftService=Service::with('owner')->withAvg('ratings:value')->withCount('ratings')->whereIn('id',$leftService->pluck('id'))->get();




       $right_product=Product::with('owner')->withAvg('ratings:value')->withCount('ratings')->orderBy('updated_at', 'desc')->take(4)->get();




        return view('home',['ads'=>$ads,'l_service'=>$leftService,'r_service'=>$right_Service,'l_products'=>$leftproducts,'r_products'=>$right_product]);
        # code...
    }
}
