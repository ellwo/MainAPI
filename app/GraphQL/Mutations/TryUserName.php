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
                "errors"=>json_encode( $validator->errors()),
                "message"=>$validator->errors()->first('username'),
                "state"=>false,
                "code"=>405
            ];

            return $resdata;


        }


        $resdata=[
           "errors"=>json_encode( $validator->errors()),
           "message"=>"enabled",
           "state"=>true,
           "code"=>202


       ];
        return $resdata;
    }
        else

        return $data=[
            "errors"=>"",
            "message"=>"",
            "state"=>false,
            "code"=>405
        ];
        // TODO implement the resolver
    }
}
