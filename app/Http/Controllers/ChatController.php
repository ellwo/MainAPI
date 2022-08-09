<?php

namespace App\Http\Controllers;

use App\Models\Bussinse;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$type='user',$chattings="all",$chat_room_id='all')
    {




        $userid=auth()->user()->id;
        $type=$request['type']!=null?$request['type']:'user';
        $chattings=$request['chattings']!=null?$request['chattings']:$userid;
        $chat_room_id=$request['chat_room_id']!=null?$request['chat_room_id']:'all';



        if($type=='bus' && $chattings!='all'){

            $b=Bussinse::find($chattings);

            if($b->user_id!=$userid)

            return redirect('/inbox');


        }






        return view('chat.chat',['userid'=>$userid,'type'=>$type,'chat_room_id'=>$chat_room_id,'chattings'=>$chattings]);








        
        return view("chat.chat",["id"=>$chattings,"type"=>$type,"chat_room_id"=>$chat_room_id]);












        $ty=$request["type"];
        if($ty=="user"){

            $cri=$request->has("chat_room_id")?$request->chat_room_id:"no";
            return view("chat.chat",["id"=>auth()->user()->id,"type"=>"user","chat_room_id"=>$cri]);
        }
        else if($ty=="bus"){

            $cri=$request->has("chat_room_id")?$request->chat_room_id:"no";

            $buss=Bussinse::find($request["bussinse_username"]);

            if($buss->user_id!=auth()->user()->id){
                return redirect()->route("profile");

            }


            return view("chat.chat",["id"=>$buss->id,"type"=>"buss","chat_room_id"=>$cri]);
        }
        else
    {    $cri=$request->has("chat_room_id")?$request->chat_room_id:"no";
        return view("chat.chat",["id"=>"all","type"=>"user","chat_room_id"=>$cri]);
    }



        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
    }


    public function create_chatroom(Request $request)
    {
        $model=null;

       $type= $request["type"];
       $chatable_id=$request["chatable_id"];
       $user=auth()->user();

       if($type=='User'){
           $model=User::where("username","=",$chatable_id)->first();
       }
       else if($type=='Bussinse'){
           $model=Bussinse::where("username","=",$chatable_id)->first();
       }


       if($model!==null) {
       $chatroom=$user->startconvristion($model);


       return  redirect("/inbox/user/".$user->id."/".$chatroom->id."");

       }

        # code...
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
}
