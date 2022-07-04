<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\LoginRequestAPI;
use App\Http\Requests\Api\Auth\LoginRequestapi2;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Validator;
class AuthAPIController extends Controller
{
    //



    public function rigister(Request $request)
    {




        $validator = Validator::make($request->all(), [
            'name' => 'required',


            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',

        ]);

        if($validator->fails()){
            return response(['Error validation','error'=>$validator->errors()],401 );
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);
        $tokenname=isset($this->token_name)?$this->token_name:"mytoken";

        $user->assignRole('normal');


        $token = $user->createToken($tokenname)->plainTextToken;
        $response = [
            'status'=>true,
            'message'=>'registered successfully!',
            'data' =>[
                'user'=>$user,
                'token'=>$token
            ]
        ];
        return response($response,201);
    }



    public function login(LoginRequestapi2 $request)
    {

//        return response(['yy'],400);
        return $request->authenticate();


     //   $request->session()->regenerate();



    }
    public function logout(Request $request)
    {
        # code...
        //$user=$request->user();
        $request->user()->currentAccessToken()->delete();

        return response(['stauts'=>'logout Sucessfull'],200);

    }
}
