<?php

namespace App\Http\Controllers\Api\Chat;

use App\Events\MessageRescive;
use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Http\Resources\ChatRoomResource;
use App\Http\Resources\MessageResource;
use App\Models\Bussinse;
use App\Models\ChatRoom;
use App\Models\City;
use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Validator;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        try{
        $user=User::find($_GET["me"]);
        $chatrooms=$user->chatrooms()->get();

        return response($chatrooms,200);

    }catch(Exception $e){

        return $e->getMessage();



        }

    }



    public function user_chat(Request $request)
    {
        if($request->isMethod("POST")){

            if($request["type"]=="user"){

                $user=User::find($request["chatting_id"]);


             //   return dd($user->chatrooms_only());
                if($user!=null){

            $_GET["chattings_id"]=$user->id;




                return ChatRoomResource::collection($user->chatrooms_only()->get());

            }
        }
        else if($request["type"]=="bus"){
            $buss=Bussinse::find($request["chatting_id"]);

            if($buss!=null && $buss->user_id===auth()->user()->id){
        $_GET["chattings_id"]=$buss->id;
            return ChatRoomResource::collection($buss->chatrooms_only()->get());

        }

        else{
            return ["message"=>"Not Found"];
        }

        }



        else{
            return ["message"=>"Not Found"];
        }



    }
        else{
            return ["message"=>"Not Found"];


        }



        # code...
    }

    public function chatroom_messages(Request $request)
    {
        if($request->isMethod("POST")){

            $chatroom=ChatRoom::find($request["chat_room_id"]);

            if($chatroom!=null){
            DB::statement("update messages set is_readed=true where chat_room_id=".$request["chat_room_id"]."  and sender!=".$request["chattings_id"]);

            if(isset($request["page"])){
            $_GET["page"]=$request["page"];
            request()->request->set("page",$request["page"]);

        }
        else{

            $_GET["page"]=$request["page"];
            request()->request->set("page",1);

        }



            if ($request["page"]==1)
           { $messages=$chatroom->messages()->select("*")
            ->orderBy("id","desc")->paginate(15)->reverse()
            ->groupBy(function($date) {
                //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                return Carbon::parse($date->created_at)->format('d/m/Y'); // grouping by months
                        });
                    }


            if($request["page"]!=1){
            $messages=$chatroom->messages()->select("*")
            ->orderBy("id","desc")->paginate(15)
            ->groupBy(function($date) {
                //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                return Carbon::parse($date->created_at)->format('d/m/Y'); // grouping by months
            });
        }

        //$lastPage=$messages->lastPage()==$messages->currentPage();
            $data[]=[
                'chatroom'=>$messages,
                'chatable'=>$chatroom->chatable($request["chattings_id"]),

            ];

            $lastkey=null;
            foreach($messages as $k=>$v)
            $lastkey=$k;

            if($lastkey!=null)
            {
                $lastkey=strtotime($lastkey);
               $lastkey= date("Y-m-d h:i:sa", $lastkey);
            }
            return [
                'chatroom'=>$chatroom,
                'lastindex'=>$lastkey,
                'messages'=>$messages,
                'chatable'=>$chatroom->chatable($request["chattings_id"]),
                'isitBlocked'=>$chatroom->isitBlocked($request["chattings_id"]),
                'isitBlocking'=>$chatroom->isitBlocking($request["chattings_id"]),




            ];

            return response($messages,200);
        }
        else{
            return response(401,["message"=>"Not Found"]);
        }
        }
        else{
            return response(401,["message"=>"Not Found"]);


        }



        # code...
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

        $validator = Validator::make($request->all(), [
            'content'=>'required',
            'sender'=>'required',
            'chat_room_id'=>'required',
            'type_message'=>'required',
        ]);
        if(!$validator->fails()){
        $message=Message::create($validator->validated());

        $chatroom=ChatRoom::find($request["chat_room_id"]);
        if($chatroom->to_id!=$request["sender"])
        $id=$chatroom->from_id;
        else
        $id=$chatroom->to_id;

        try{

        broadcast(new MessageSent($message));
        broadcast(new MessageRescive($message,$id));
        }catch(Exception $e){
            return $e->getMessage();
        }
        return [
            'userauth'=>$id
        ];


    } else{
            return response($validator->errors(),422);
        }
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
