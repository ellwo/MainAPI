<?php

namespace App\GraphQL\Queries;

use App\Models\Bussinse;
use App\Models\Department;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;

class MainQuery
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver

       // $gender=$args[""];







        Cache::forget("departments");
       $departments=Cache::remember("departments",60*60,function (){
           return  Department::all();
       });

       $bussinses=[];







       $products=[];
       foreach ($departments as $department){

/*           $products_p=Product::where('department_id','=',$department->id)->
               withAvg('ratings:value')->orderByRelation('ratings:value', 'desc', 'avg')
               ->take(3)->get();

           foreach ($products_p as $pro){
               $products[]=$pro;
           }*/

           $bus=Bussinse::where("department_id","=",$department->id)
               ->with("products.ratings")
               ->withAvg("products.ratings:value")->orderByRelation("products.ratings:value","desc","avg")
               ->take(2)->get();

           foreach ($bus as $bussinse)
               $bussinses[]=$bussinse;

       }
       //=Product::with("parts","bussinse","cities","department")->groupBy("department_id")->get();




        return $data=[
            'products'=>$products,
            'departments'=>$departments
            ,'bussinses'=>$bussinses
        ];



    }
}
