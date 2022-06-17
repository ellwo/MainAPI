<?php

namespace App\Http\Controllers;

use App\Models\Bussinse;
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
            'user_id'=>25,
            'avatar'=>$request["avatar"],
            'phone_numbers'=>$request["phone_numbers"],
            'contact_links'=>$request["contact_links"],
            'imgs'=>$request["imgs"],
            'note'=>$request["note"],
            'address'=>$request["address"],
        ]);

        // $cities=$request["cities"];
        // $buss->attach($cities);
        // $parts=$request["parts"];
        // $buss->attach($parts);









        return dd($request->all());
        //
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

       // $b=Bussinse::where("username","=",$username)->first();

     //   $b->products()->saveMany(Product::whereDoesntHave('owner')->inRandomOrder()->take(rand(1,4))->get());

       echo Product::where("owner_type","=",null)->where("owner_id","=",null)->get();
    return;
  //      return dd($b->products()->count());
        //
      //  $bussinse=Bussinse::find(request('id'));



    //   dd($b->withAvg("products:ratings:value")->get());
    //   return;
    //   $sum=0;
    //   $count=0;
    //   foreach($b->products()->withAvg("ratings:value")->get() as $prod){
    //     $sum+=$prod->ratings_value_avg;
    //     $count++;
    //   }


    //   if($count!=0)
    //     return (int)$sum/$count;
    //     else
    //     return 0;
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
    public function update(Request $request, Bussinse $bussinse)
    {
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
