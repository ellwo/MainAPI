<?php

namespace App\Http\Controllers;

use App\Models\Bussinse;
use App\Models\Location;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BussinseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        // if (date('Y-m-d H:i:s') < auth()->user()->blocked_date) {
        //     $blocked_days = now()->diffInDays(auth()->user()->blocked_date);

       $bussinses= Bussinse::with("department:id,name")->with("user:id")->withCount("followers_b")->withCount("products as products_count")->withAvg("ratings:value")->get();
        return view('bussinsess.bussinse-card',compact('bussinses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //



     //   $bu=Bussinse::select('nama','usernam')->take(5)->get();




        return view('bussinsess.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


       // return dd(Bussinse::with('cities','parts')->where('username','dobaa')->first());



        $this->validate($request,[
            'name'=>'required|unique:bussinses,name|string',
            'department_id'=>'required|exists:departments,id',
            'username' => ['min:4','regex:/^[a-z\d_.]{2,20}$/i','required','string', 'max:191', 'unique:users','unique:bussinses'],
            'email'=> ['email','required','unique:bussinses,email'],

        ]);

        $buss=Bussinse::create([
            'name'=>$request["name"],
            'username'=>$request["username"],
            'email'=>$request["email"],
            'department_id'=>$request['department_id'],
            'user_id'=>auth()->user()->id,
            'avatar'=>$request["avatar"],
            'phone_numbers'=>$request["phone_numbers"],
            'contact_links'=>$request["contact_links"],
            'imgs'=>$request["imgs"],
            'note'=>$request["note"],
            'address'=>$request["address"],
        ]);

       $cities=explode(',',$request->cities);
        $cities=$request["cities"];
        $buss->cities()->attach($cities);

        $parts=explode(',',$request->parts);
        // $cities=$request["cities"];
         $buss->parts()->attach($parts);

         $address=$request->locs_address;
         $phone=$request->locs_phone;
         $markts=$request->markt_id;



         if($address!=null)
         Location::create([
            'markt_id'=>$markts[0],
            'address'=>$address,
            'phone'=>$phone,
            'bussinse_id'=>38
        ]);






        // $parts=$request["parts"];
        // $buss->attach($parts);

        return redirect()->route('b.manage',['username'=>$buss->username])->with('status','تم الحفظ بنجاح ');











        return dd($request->all());
        //
    }


    public function manage(Request $request)
    {

        $bussinse=Bussinse::with('cities:id,name','parts:id,name','department:id,name,type')
        ->withCount('followers_b as f_count')->
        where('username','=',$request['username'])->first();

        if($bussinse->user_id!=auth()->user()->id)
        {

            return redirect()->route('b.show',$bussinse->username);
        }

        //return dd($bussinse);
        return view('bussinsess.manage',compact('bussinse'));
        # code...
    }

    public function savechangeimgs(Request $request)
    {

        $bussinse=Bussinse::where("username","=",$request["bussinse_username"])->first();

        if($bussinse!=null){

            $bussinse->avatar=$request["avatar"];
            $bussinse->imgs=$request["imgs"];
            $bussinse->save();
            return $data = ['statt' => 'ok'];
        }
        else{
            return $data = ['statt' => 'error', 'message' => 'Some Data are missed'];

        }



        # code...
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bussinse  $bussinse
     * @return \Illuminate\Http\Response
     */



     public function follow_bussinse(Request $request)
     {

        if($request->has("buss_id")){
            $user=User::find(auth()->user()->id);

            $bussinse=Bussinse::find($request["buss_id"]);

            if($user!=null){



             if($request["typef"]=="follow"){
           if($user->follow($bussinse))
            return $data=[
                "status"=>true,
                'message'=>'تم المتابعة'
            ];
            else{

            return $data=[
                "status"=>false,
                'message'=>'فشل'
            ];
            }

        }

        else{

            if($user->unfollow($bussinse))
            return $data=[
                "status"=>true,
                'message'=>'تم الغاء المتابعة'
            ];
            else{

            return $data=[
                "status"=>false,
                'message'=>'فشل'
            ];
            }



        }




        }
        else{
            return $data=[
                "status"=>false,
                'message'=>'un auth فشل'
            ];
        }

        }
        else{
            return $data=[
                "status"=>false,
                'message'=>'فشل b is not set'
            ];
        }


         # code...
     }


    public function show($username)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bussinse  $bussinse
     * @return \Illuminate\Http\Response
     */
    public function edit(Bussinse $bussinse)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bussinse  $bussinse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bussinse $b)
    {

        $bussinse=$b;

        if(($bussinse->username!=$request['username'] ||
        $bussinse->name!=$request['name'] ||
         $bussinse->email!=$request['email'])&&
         ($bussinse->username!=null &&
          $bussinse->name!=null && $bussinse->email!=null) )
        $this->validate($request,[
            'name'=>'required|unique:bussinses,name|string',
            'department_id'=>'required|exists:departments,id',
            'username' => ['min:4','regex:/^[a-z\d_.]{2,20}$/i','required','string', 'max:191', 'unique:users','unique:bussinses'],
            'email'=> ['email','required','unique:bussinses,email'],

        ]);

        $bussinse->update([
            'name'=>$request["name"],
            'username'=>$request["username"],
            'email'=>$request["email"],
            'department_id'=>$request['department_id'],
            'phone_numbers'=>$request["phone_numbers"],
            'contact_links'=>$request["contact_links"],
            'note'=>$request["note"],
            'address'=>$request["address"],
        ]);

        $bussinse->cities()->detach();
        $bussinse->parts()->detach();
        $cities=explode(',',$request->cities);
        // $cities=$request["cities"];
         $bussinse->cities()->attach($cities);

        $parts=explode(',',$request->parts);
        // $cities=$request["cities"];
         $bussinse->parts()->attach($parts);
        // $parts=$request["parts"];
        // $buss->attach($parts);

        return redirect()->route('b.manage',['username'=>$bussinse->username])->with('status','تم التعديل ينجاح ');

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bussinse  $bussinse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bussinse $bussinse)
    {
        //
    }
}
