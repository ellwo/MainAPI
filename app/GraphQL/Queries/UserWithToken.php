<?php

namespace App\GraphQL\Queries;

use Illuminate\Support\Facades\Auth;

class UserWithToken
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        if(Auth::user()!=null){


            $user= Auth::user();
            if(isset($args["logoutfromall"]) && $args["logoutfromall"]==true)
                $user->tokens()->delete();

           $token= $user->createToken($args["tokenname"])->plainTextToken;

           return $data=[
               "user"=>$user,
               "token"=>$token
           ];
        }
        else
            return null;




    }
}
