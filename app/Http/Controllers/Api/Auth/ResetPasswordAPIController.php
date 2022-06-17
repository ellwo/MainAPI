<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

use Illuminate\Support\Facades\Password;

class ResetPasswordAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create(Request $request)
    {
        # code...
        return view('auth.forgot-password');
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
            'email' => 'required|email|exists:users',
        ]);

        if($validator->fails()){
            return response(['Error validation','error'=>$validator->errors()],401 );
        }

        $status = Password::sendResetLink(
            $request->only('email')
        );


        $response = [
        'status'=>$status,
            'message'=>'registered successfully!',
            'data' =>[
                'send it to'=>$request->only('email')
            ]
        ];
        return response($response,201);



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
