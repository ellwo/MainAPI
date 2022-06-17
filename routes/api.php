<?php

use App\Http\Controllers\Api\Auth\AuthAPIController;
use App\Http\Controllers\Api\Auth\ResetPasswordAPIController;
use App\Http\Controllers\Api\BussinseController;
use App\Http\Controllers\Api\Chat\ChatController;
use App\Http\Controllers\UploadeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post("trylogin",function (Request $request){

    $guard =  \Auth::guard(config('sanctum.guard', 'web'));

    if( \Illuminate\Support\Facades\Auth::attempt($request->only("email","password"))) {

        $user =auth()->user();
        $user->createToken("api");
       return $user->tokens->last();
      //  return $user;

    }
    else
    {
        return null;
    }

});

Route::post('/login',[AuthAPIController::class,'login']);
Route::middleware('authapi')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/testColors",function (Request $request){

    $product=\App\Models\Product::find(6);
    $data=[];

    foreach ($product->colors as $k=>$v){

        $data[]=[
            "__typename"=>"JsonType",
            "k"=>$k,
            "v"=>$v
        ];
    }
    $dta["data"]=$data;
    return response()->json([ json_encode($product->colors)]);




});

Route::get('/any', function (Request $request) {
    return response(['user'=> auth()->user()],200);
})->middleware('auth:sanctum');

Route::get('/rate/{id?}',[BussinseController::class,'rate'])->middleware('authapi');
Route::apiResource('Bussinses', BussinseController::class);

Route::post('/resetpassword',[ResetPasswordAPIController::class,'store']);


Route::post('/rigister',[AuthAPIController::class,'rigister']);

Route::post('/logout',[AuthAPIController::class,'logout'])->middleware('auth:sanctum');

Route::get('/token', function (Request $request) {

    return response(request());
});
Route::post("/chatroom_message",[ChatController::class,'chatroom_messages'])->name("chatroom_message");
Route::post("/user_chat",[ChatController::class,'user_chat'])->name("user_chat");
Route::apiResource('chat',ChatController::class);

Route::post("/delete.uploade",[UploadeController::class,'delete'])->name("delete.uploade.api");


