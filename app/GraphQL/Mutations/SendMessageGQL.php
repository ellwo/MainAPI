<?php

namespace App\GraphQL\Mutations;

use App\Events\ChatNotify;
use App\Models\ChatRoom;
use App\Models\Message;
use Exception;

class SendMessageGQL
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $guard =  \Auth::guard(config('sanctum.guard', 'web'));

        $user=$guard->user();


        $validator = \Illuminate\Support\Facades\Validator::make($args, [
            'message'=>['string','required'],
            'type_message'=>['required'],
            'chat_room_id'=>['required','exists:chat_rooms,id']

        ]);


        if($validator->fails()){
            //return  null;

            $resdata=[
                "errors"=>json_encode( $validator->errors()),
                "message"=>"There was Invaild Inputs",
                "state"=>false,
                "code"=>400


            ];
            return  $resdata;
        }


        $message=$args["message"];
        $type=$args["type_message"];
        $chat_room_id=["chat_room_id"];
        $chatroom=ChatRoom::find($chat_room_id);

        //$message=Message::
        $mesage=Message::create([
            'sender'=>auth()->user()->id,
            'content'=>$message,
            'chat_room_id'=>$chat_room_id,
            'type_message'=>$type
        ]);

        $user_id=0;
        if($chatroom->from_id==$user->id){
            $user_id=$chatroom->to_id;
        }
        else
        $user_id=$chatroom->from_id;

        try{
        broadcast(new ChatNotify($mesage,$user_id));
        }
        catch(Exception $ex){

            return $data=[

                'state'=>false,
                'errors'=>$ex->getMessage(),
                'message'=>'Not sended ',
                'code'=>500

            ];
        }

        return $data=[

            'state'=>true,
            'errors'=>null,
            'message'=>'sende it',
            'code'=>200
        ];





    }
}
