<?php

namespace App\GraphQL\Mutations;

use App\Models\Bussinse;
use Illuminate\Support\Facades\Auth;

class FollowBussinse
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver

        $user=Auth::user();





        if(isset($args["type"]) && $args["type"]=="follow"){

        if($user->follow($args["bussinse_id"]))
        return $data=[
            'message'=>"followed Secussfully"
            ,'state'=>true,
            'state_code'=>200,
            'errors'=>[
            ]
        ];
        else
        return $data=[
            'message'=>'cant follow this Bussinse'
            ,'state'=>false,
            'state_code'=>401,
            'errors'=>[
                'mybe is blocked to follow'
            ]
        ];

    }

    else if (isset($args["type"]) && $args["type"]!="follow"){

        if($user->unfollow($args["bussinse_id"]))
        return $data=[
            'message'=>"unfollowed Secussfully"
            ,'state'=>true,
            'state_code'=>200,
            'errors'=>[
            ]
        ];
        else
        return $data=[
            'message'=>'cant Unfollow this Bussinse'
            ,'state'=>false,
            'state_code'=>401,
            'errors'=>[
                'mybe is blocked to follow'
            ]
        ];
    }



    }
}
