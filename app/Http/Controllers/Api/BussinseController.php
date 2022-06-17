<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BussinseResource;
use App\Models\Bussinse;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class BussinseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


       // return 'yes';
        //$bydept=$request->has('dept')? $request['dept']:'all';

       //glob $userid=$request->user()->id;

     //   return Bussinse::select('name','id')->whereRelation(
       //     'cities','name','LIKE','%o%')->with('products:name,price,bussinse_id','cities:name')->get();


       //return $request->user();

       //Cache::forget('bussinses');

       $user=User::find(5);

       //$user->bussinses_followed()->attach(Bussinse::inRandomOrder()->take(5)->pluck("id"));

       $buss=Bussinse::find(15);

     //  $user->follow(15);
       dd($user->unfollow(15));
  //    dd($user->follow(15));
       //$buss->block_user(5);

       return dd($buss->followers);




        //$request['page']='3';
       // $_GET["page"]='3';
        \request()->request->set("page",1);
        $products_byrating=Product::whereHas('cities',function (Builder $query){
            $query->where('id','=',9);
        })
            ->orderByRelation('ratings:value', 'desc', 'avg')
            ->with('cities')->withSum('ratings:value')->simplePaginate(2);

        return dd($products_byrating->links());

        $pro_byratings=[
            'products'=>$products_byrating,
            'paginatorInfo'=>[
                'count'=>$products_byrating->perPage(),
                'total'=>$products_byrating->total(),
                "perPage"=>$products_byrating->perPage(),
                "currentPage"=>$products_byrating->currentPage(),
                "lastPage"=>$products_byrating->lastPage(),
                "hasMorePages"=>true
            ]
        ];
        //$links=$products_bycitiy->links()->getData();
     //   dd($links["paginator"]);

        return dd($products_byrating->links()->getData()["paginator"]);




        return BussinseResource::collection(Bussinse::inRandomOrder()->with('user','products','parts','cities')->take(5)->get());

       // $products=Product::with("parts")->groupBy("created_at")->get();
 //dd($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("bussinsess.create");
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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


    public function rate(Request $request,$id)
    {

       return request();
       $b= Bussinse::find($id);
           // $user->rate($b,3);

        return $b->ratingsCount();
    }
}
