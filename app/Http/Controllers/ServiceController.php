<?php

namespace App\Http\Controllers;

use App\Models\Bussinse;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $type=$request["type"];

        return redirect()->route('service.add.livewire',['step'=>1,'username'=>$request['username']]);

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


        $this->validate($request,[
            'name'=>'required|string|max:100',
            'price'=>'numeric|required',
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


         $product=Service::create([
            'name'=>$request['name'],
            'price'=>$request['price'],
            'discrip'=>$request['discrip'],
            'owner_id'=>$request['owner_id'],
            'owner_type'=>$request['owner_type'],
            'department_id'=>$request['department_id'],
            'img'=>$request['img'],
            'imgs'=>$request['imgs'],
            'status'=>$request["status"],
            'how_long'=>$request["how_long"]."-يوم",
            'note'=>$note,
            'min_pyment'=>$request["min_pyment"]
        ]);
        $parts=explode(',',$request->parts);
        // $cities=$request["cities"];
        if($request->parts!='')
         $product->parts()->attach($parts);


         return redirect()->route('mange.services')->with('status','تمت اضافة المنتج بنجاح');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //

     $service->vzt()->increment();
        $id=$service->id;
        $service=$service->with('parts')->withAvg('ratings:value')->where('id','=',$id)->first();

        $realted_products=[];

       $owner3= $service->owner->services()->withCount('ratings')->orderByRelation('ratings:value', 'desc', 'avg')->take(3)->get();
       if($service->department!=null)
       $dept_3=$service->department->services()->withCount('ratings')->orderByRelation('ratings:value', 'desc', 'avg')->take(3)->get();
       else
       $dept_3=Service::withCount('ratings')->orderByRelation('ratings:value', 'desc', 'avg')->take(3)->get();


       foreach($owner3 as $p){
        $realted_products[]=$p;
       }
       foreach($dept_3 as $p){
        $realted_products[]=$p;
       }






        return view('servicesview.show',['product'=>$service,'related_products'=>$realted_products]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
        return view('manage.service.service-edit',['product'=>$service]);

    }

    public function rate(Request $request)
    {
       $product=Service::find($request['product_id']);

       $user=Auth::user();

     $rate=  $user->rate_comment($product,$request['value'],$request['comment']);

       return $data=[
           'status'=>true,
           'last_rate'=>$rate

       ];

       # code...
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //

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


         $service->update([
            'name'=>$request['name'],
            'price'=>$request['price'],
            'discrip'=>$request['discrip'],
            'owner_id'=>$request['owner_id'],
            'owner_type'=>$request['owner_type'],
            'department_id'=>$request['department_id'],
            'img'=>$request['img'],
            'imgs'=>$request['imgs'],
            'min_pyment'=>$request["min_pyment"],
            'how_long'=>$request["how_long"],
            'note'=>$note
        ]);
        $parts=explode(',',$request->parts);
        // $cities=$request["cities"];
         $service->parts()->attach($parts);


         return redirect()->route('mange.services')->with('status','تم تعديل الخدمة بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
