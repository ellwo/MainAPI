<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Validator;
class LoginRequestapi2 extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        ];
    }

    public function authenticate()
    {


        $validator = Validator::make($this->all(), [
            'user' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response(['Error validation','error'=>$validator->errors()],401 );
        }

        if($this->ensureIsNotRateLimited()){


        $userN='username';
        if(strpos($this->input("user"),"@")!=false){
        $userN='email';    }



        if (! Auth::attempt([$userN=>$this->input("user"),"password"=>$this->input("password")], $this->boolean('remember')))
        {

            RateLimiter::hit($this->throttleKey());


            return response(['error'=>['Your Email Or Password uncorcut']],403);
        }
        else{

            $user=auth()->user();
            if(isset($this->logoutfromall))
            $user->tokens()->delete();


            //        return $user;

            $tokenname=isset($this->token_name)?$this->token_name:"mytoken";

                    $token =$user->createToken($tokenname)->plainTextToken;

                    $user->assignRole('admin');

                    $response = [
                        'status'=>true,
                        'message'=>'Login successful!',
                        'data' =>[
                            'user'=>$user,
                            'hasVerifiedEmail'=>$user->hasVerifiedEmail(),
                            'token'=>$token,
                            "role"=>$user->roles
                        ]
                    ];
                    return response($response,201);

        }

    }

    else
    {

        $seconds = RateLimiter::availableIn($this->throttleKey());


        return response(['error'=>'You have been try so match try after'.$seconds],400);
    }


    }



    public function ensureIsNotRateLimited()
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return true;
        }


        else {

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());
        return false;
    }

}

public function throttleKey()
{
    return Str::lower($this->input('email')).'|'.$this->ip();
}
}
