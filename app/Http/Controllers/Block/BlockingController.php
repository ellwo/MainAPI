<?php

namespace App\Http\Controllers\Block;

use App\Http\Controllers\Controller;
use App\Models\Bussinse;
use App\Models\ChatRoom;
use App\Models\User;
use Illuminate\Http\Request;

class BlockingController extends Controller
{
    //



    public function block(Request $request)
    {




        $chatroom=ChatRoom::where("id","=",$request["chat_room_id"])->first();

        if($chatroom->to_id==$request["me"]){
            $chatroom->to->block($chatroom->from);

        }
        else if($chatroom->from_id==$request["me"]){

            $chatroom->from->block($chatroom->to);
        }







        return [
            "chatroomid"=>$request["chat_room_id"],
            "me"=>$request["me"],
            "from"=>get_class( $chatroom->from),
            "to"=>get_class($chatroom->to)
        ];







        return [
            "chatroomid"=>$request["chat_room_id"],
            "me"=>$request["me"]
        ];




        # code...

    }
}
