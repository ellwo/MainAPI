<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Bussinse;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        $city=request()->headers->has("city")? \request()->header("city"):"";
        $lastSearch=request()->headers->has("lastSearch")? \request()->header("lastSearch"):"";
        //$city=request()->headers->has("city")? \request()->header("city"):"";
        $city=request()->headers->has("city")? \request()->header("city"):"";
        return response()->json(ProductResource::collection(Product::paginate(50)));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $type=$request["type"];

        return redirect()->route('product.add.livewire',['step'=>1,'username'=>$request['username']]);

        //


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $this->validate($request,[
            'name'=>'required|string|max:100',
            'price'=>'numeric|required',
            'discrip'=>'string',
            'parts'=>'string',
            'owner_id'=>'required',
            'owner_type'=>'required',
            'department_id'=>'required|exists:departments,id',
        ]);
        if($request['owner_type']==Bussinse::class)
        {
            $bussinse=Bussinse::find($request["owner_id"]);
            if($bussinse->user_id!=auth()->user()->id)
            abort(403,'لاتمتلك الصلاحيات اللازمة لاتمام العملية');
        }


         $note=[];
         $n_key=$request["n_key"];$n_value=$request["n_value"];
         for($i=0; $i<count($n_key); $i++){

            if($n_key[$i]!=null && $n_value!=null)
            $note[$n_key[$i]]=$n_value[$i];
         }
         $product=Product::create([
            'name'=>$request['name'],
            'price'=>$request['price'],
            'discrip'=>$request['discrip'],
            'owner_id'=>$request['owner_id'],
            'owner_type'=>$request['owner_type'],
            'department_id'=>$request['department_id'],
            'img'=>$request['img'],
            'imgs'=>$request['imgs']??[],
            'status'=>$request["status"],
            'year_created'=>$request["year_created"],
            'note'=>$note
        ]);
        $parts=explode(',',$request->parts);
         $product->parts()->attach($parts);
         return redirect()->route('mange.products',
         ['username'=>$product->owner->username])->with('status','تمت اضافة المنتج بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

        //return $product->;
        //dd($product);re
        $product->vzt()->increment();
        $id=$product->id;
        $product=$product->with('parts')->withAvg('ratings:value')->where('id','=',$id)->first();

        $realted_products=[];

       $owner3= $product->owner->products()->withCount('ratings')->orderByRelation('ratings:value', 'desc', 'avg')->take(3)->get();
       if($product->department!=null)
       $dept_3=$product->department->products()->withCount('ratings')->whereNotIn('id',$owner3->pluck('id')->toArray())->orderByRelation('ratings:value', 'desc', 'avg')->take(5)->get();
       else
       $dept_3=Product::withCount('ratings')->orderByRelation('ratings:value', 'desc', 'avg')->take(3)->get();


       foreach($owner3 as $p){
        $realted_products[]=$p;
       }
       foreach($dept_3 as $p){
        $realted_products[]=$p;
       }






        return view('productsview.show',['product'=>$product,'related_products'=>$realted_products]);
        return dd($product);


        return ProductResource::make($product);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */


     public function rate(Request $request)
     {
        $product=Product::find($request['product_id']);

        $user=Auth::user();

      $rate=  $user->rate_comment($product,$request['value'],$request['comment']);

        return $data=[
            'status'=>true,
            'last_rate'=>$rate
        ];

        # code...
     }

    public function edit(Product $product)
    {
        //
        return view('manage.product.product-edit',compact('product'));
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

        $this->validate($request,[
            'name'=>'required|string|max:100',
            'price'=>'numeric|required',
            'discrip'=>'string',
            'parts'=>'string',
            'owner_id'=>'required',
            'owner_type'=>'required',
            'department_id'=>'required|exists:departments,id',
        ]);

  if($request['owner_type']==Bussinse::class){

            $bussinse=Bussinse::find($request["owner_id"]);
            if($bussinse->user_id!=auth()->user()->id)
            abort(403,'لاتمتلك الصلاحيات اللازمة لاتمام العملية');


        }



         $note=[];
         $n_key=$request["n_key"];
         $n_value=$request["n_value"];
         for($i=0; $i<count($n_key); $i++){
            $note[$n_key[$i]]=$n_value[$i];
         }


         $product->update([
            'name'=>$request['name'],
            'price'=>$request['price'],
            'discrip'=>$request['discrip'],
            'owner_id'=>$request['owner_id'],
            'owner_type'=>$request['owner_type'],
            'department_id'=>$request['department_id'],
            'img'=>$request['img'],
            'imgs'=>$request['imgs'],
            'status'=>$request["status"],
            'year_created'=>$request["year_created"],
            'note'=>$note
        ]);
        $parts=explode(',',$request->parts);
        // $cities=$request["cities"];
        $product->parts()->detach();
         $product->parts()->attach($parts);


         $product->save();


         return redirect()->route('mange.products')->with('status','تم تعديل المنتج بنجاح');





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
