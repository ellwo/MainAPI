<?php

namespace App\Http\Controllers;

use App\Models\Bussinse;
use App\Models\Department;
use App\Models\Part;
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
        $search=isset($request['search'])?$request['search']:"";

        if($request->has('dept')){

            $dept=Department::find($request['dept']);

            $parts=isset($request['parts'])?$request["parts"]:[];
        $part=isset($request['part'])?$request['part']:"";
        $orderby=isset($request['orderby'])?$request['orderby']:"updated_at";
        $ordertype=isset($request['ordertype'])?$request['ordertype']:"desc";


            if($dept->type===1){
               // return $this->product_search($request);

               return redirect()->route('search-product',['dept'=>$dept,'parts'=>$parts,'part'=>$part,'search'=>$search,'orderby'=>$orderby,'ordertype'=>$ordertype]);
            }
            else{

            return redirect()->route('search-service',['dept'=>$dept,'parts'=>$parts,'part'=>$part,'search'=>$search,'orderby'=>$orderby,'ordertype'=>$ordertype]);
        }
        }



       $products=Product::with('parts','department','owner')
       ->withAvg('ratings:value')
       ->withCount('ratings')
       ->where(function($query)use($search){
               $query->where('name','LIKE','%'.$search.'%')
               ->Orwhere('discrip','LIKE','%'.$search.'%')
               ->Orwhere('note','LIKE','%'.$search.'%');
       })->OrwhereHas(
           'parts',function ($query)use($search){
               $query->where('parts.name','LIKE','%'.$search.'%')->Orwhere('parts.note','like','%'.$search.'%');
       }
       )->OrwhereHas('department',function($query)use($search){
        $query->where('name','Like','%'.$search.'%')->Orwhere('note','like','%'.$search.'%');
       })->orderByRelation('ratings:value', 'desc', 'avg')->take(7)->get();


       $service=Service::with('parts','department','owner')
       ->withAvg('ratings:value')
       ->withCount('ratings')
       ->where(function($query)use($search){
               $query->where('name','LIKE','%'.$search.'%')
               ->Orwhere('discrip','LIKE','%'.$search.'%')
               ->Orwhere('note','LIKE','%'.$search.'%');
       })->OrwhereHas(
           'parts',function ($query)use($search){
               $query->where('parts.name','LIKE','%'.$search,'%');
       }
       )->OrwhereHas('department',function($query)use($search){
        $query->where('name','Like','%'.$search.'%')->Orwhere('note','like','%'.$search.'%');
       })->orderByRelation('ratings:value', 'desc', 'avg')->take(7)->get();


       $searching_parts=Part::where('name','LIKE','%'.$search.'%')->Orwhere('note','LIKE','%'.$search."%")->get();
       $searching_departments=Department::where('name','LIKE','%'.$search.'%')->Orwhere('note','LIKE','%'.$search."%")->get();
        $bussinses=Bussinse::where('name','LIKE','%'.$search.'%')->Orwhere('note','LIKE','%'.$search."%")->orderBy('updated_at','desc')->take(6)->get();



        return view('search-pages.general-search-page',['search'=>$search,'bussinses'=>$bussinses,
        'services'=>$service,
        'searching_parts'=>$searching_parts,
        'searching_departments'=>$searching_departments,
        'products'=>$products]);
    }



    public function product_search(Request $request)
    {
        $dept=$request->has('dept')?$request['dept']:'any';
        $parts=isset($request['parts'])?$request["parts"]:[];
        $part=isset($request['part'])?$request['part']:"";
        $search=isset($request['search'])?$request['search']:"";
        $orderby=isset($request['orderby'])?$request['orderby']:"updated_at";
        $ordertype=isset($request['ordertype'])?$request['ordertype']:"desc";

        return view('search-pages.product-search',['dept'=>$dept,'parts'=>$parts,'part'=>$part,'search'=>$search,'orderby'=>$orderby,'ordertype'=>$ordertype]);
    }

    public function bussinse_search(Request $request)
    {

        $dept=$request->has('dept')?$request['dept']:'any';
        $parts=isset($request['parts'])?$request["parts"]:[];
        $part=isset($request['part'])?$request['part']:"";
        $search=isset($request['search'])?$request['search']:"";
        $orderby=isset($request['orderby'])?$request['orderby']:"updated_at";
        $ordertype=isset($request['ordertype'])?$request['ordertype']:"desc";
        $markt=isset($request['markt'])?$request['markt']:null;
        return view('search-pages.bussinse-search',['markt'=>$markt,'dept'=>$dept,'parts'=>$parts,'part'=>$part,'search'=>$search,'orderby'=>$orderby,'ordertype'=>$ordertype]);        # code...
    }


    public function service_search(Request $request)
    {
        $dept=$request->has('dept')?$request['dept']:'any';
        $parts=isset($request['parts'])?$request["parts"]:[];
        $part=isset($request['part'])?$request['part']:"";
        $search=isset($request['search'])?$request['search']:"";
        $orderby=isset($request['orderby'])?$request['orderby']:"updated_at";
        $ordertype=isset($request['ordertype'])?$request['ordertype']:"desc";



        return view('search-pages.service-search',['dept'=>$dept,'parts'=>$parts,'part'=>$part,'search'=>$search,'orderby'=>$orderby,'ordertype'=>$ordertype]);
    }
}
