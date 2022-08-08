<?php

namespace App\GraphQL\Mutations;

use App\Events\Registered;
use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Validator;
class RegisterUser
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public $args;
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver

        $this->args=$args;

        $username="";
        if(isset($args["username"])){


            //$args["username"]=Str::of($args["username"])->trim()->lower();
            $username=$args["username"];


        }
        else{
  //0          $username=Str::random(4);
//            $username=Str::of($username)->lower();
            if(isset($args["email"]))
                $username.=substr( $args["email"],0,strpos($args["email"],"@")-1);
            else
                $username.=Str::random(4);


                $username.=time();



            $args["username"]=$username;
        }


        if(isset($args["phone"])){
            $args["phone"]=
                Str::of($args["phone"])->trim();
            $args["phone"]=preg_replace('/[^0-9]/','',$args["phone"]);
        }


        $validator = \Illuminate\Support\Facades\Validator::make($args, [
            'name' => 'required',
            'username' =>['min:4','regex:/^[a-z\d_.]{2,20}$/i','required','string', 'max:191', 'unique:users','unique:bussinses'],
            'phone' => ['string','min:9', 'max:14', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            //return  null;

            $resdata=[
                 "user"=>null,
                "errors"=>json_encode( $validator->errors()),
                "message"=>"There was Invaild Inputs",
                "state"=>false,
                "code"=>$args["username"]


            ];
            return  $resdata;
        }





        $user=User::create(
            [
                "name"=>$args["name"],
                "email"=>$args["email"],
                "password"=>Hash::make($args["password"])
                ,"city_id"=>isset( $args["city_id"])? $args["city_id"]:1,
                "username"=>$username,
                "phone"=>isset($args["phone"])?$args["phone"]:""
            ]
        );

        $user->assignRole('normal');




        //event(new Registered($user));

        $token=$user->createToken($args["tokenname"])->plainTextToken;


        $resdata=[
                "user"=>$user,
            "errors"=>$validator->errors(),
            "message"=>"Its Register Sucssfully",
            "code"=>"200",
            "state"=>true,
            "token"=>$token
        ];
        return  $resdata;




    }

    public function ensureIsNotRateLimited()
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return true;
        }


        else {

            event(new Lockout(request()));

            $seconds = RateLimiter::availableIn($this->throttleKey());
            return false;
        }

    }

    public function throttleKey()
    {
        $thkey=isset($this->args["email"]) ? $this->args["email"] :$this->args["username"];
        return Str::lower($thkey).'|'.request()->ip();
    }
}
