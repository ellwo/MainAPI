<?php

namespace App\GraphQL\Mutations;

class TryUserName
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {

        $username=$args["username"];
        if(isset($args["username"])){

            $username=$args["username"];
        //    $args["username"]=preg_replace('/[^a-z]/','',$args["username"]);
            $args["username"]= str_replace(" ","",$args["username"]);


        $validator = \Illuminate\Support\Facades\Validator::make($args, [
            'username' => ['min:4','regex:regex:/^[a-z\d_.]{2,20}$/i','required','string', 'max:191', 'unique:users','unique:bussinses'],
          ]);

        if($validator->fails()){
            //return  null;

            $resdata=[
                 "user"=>null,
                "errors"=>json_encode( $validator->errors()),
                "message"=>"error",
                "state"=>false,
                "code"=>$username


            ];

            return $resdata;


        }


        $resdata=[
            "user"=>null,
           "errors"=>json_encode( $validator->errors()),
           "message"=>"enabled",
           "state"=>true,
           "code"=>$username


       ];
        return $resdata;
    }
        else
        return $data=[
            ''
        ];
        // TODO implement the resolver
    }
}
