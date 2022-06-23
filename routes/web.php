<?php

use App\Http\Controllers\BussinseController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Manage\ProductsManagerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadeController;
use App\Models\Bussinse;
use App\Models\City;
use App\Models\Location;
use App\Models\Markt;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get("/products",[\App\Http\Controllers\Api\BussinseController::class,'index']);



// Route::get('/ch{any}', [App\Http\Controllers\ChatController::class,"index"])
//     ->middleware('auth')
//     ->where('any', '.*');






Route::post('/block',[App\Http\Controllers\Block\BlockingController::class,'block'])->name("block");


Route::post("/create_chatroom",[App\Http\Controllers\ChatController::class,'create_chatroom'])->name("create_chatroom")->middleware("auth");

Route::post("/chatroom_message",[App\Http\Controllers\Api\Chat\ChatController::class,'chatroom_messages'])->name("chatroom_messagel");
Route::post("/user_chat",[App\Http\Controllers\Api\Chat\ChatController::class,'user_chat'])->name("user_chatl");
Route::apiResource('chatt',App\Http\Controllers\Api\Chat\ChatController::class);

    Route::get("/inbox/{type?}/{chattings?}/{chat_room_id?}",[App\Http\Controllers\ChatController::class,"index"])->name('inbox')->middleware("auth")->where('any', '.*');


Route::view("/vuetry","layoutvue");



Route::get("/getcity",function(Request $request){

    $user=User::find(Auth::user()->id);
    return response($user,200);

});

Route::get('/country',[CountryController::class,'index']);
Route::get('/',[MainController::class,'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/b.savechangeimgs',[BussinseController::class,'savechangeimgs'])->name('b.savechangeimgs');
Route::post("/b-follow",[BussinseController::class,'follow_bussinse'])->name("b-follow");
Route::get('/b.manage/{username?}',[BussinseController::class,'manage'])->name('b.manage');


Route::get("/b/@{username}",[BussinseController::class,'show'])->name("b.show");


Route::resource('/b',BussinseController::class)->only(['index','update','store','edit','create'])->name('index','b');
Route::post("/uploade",[UploadeController::class,'store'])->name("uploade");
Route::post("/delete.uploade",[UploadeController::class,'delete'])->name("delete.uploade");



Route::get('/manage/products',[ProductsManagerController::class,'manage'])->name('mange.products');












// useless routes
// Just to demo sidebar dropdown links active states.
Route::get('/buttons/text', function () {
    return view('buttons-showcase.text');
})->middleware(['auth'])->name('buttons.text');

Route::get('/buttons/icon', function () {
    return view('buttons-showcase.icon');
})->middleware(['auth'])->name('buttons.icon');

Route::get('/buttons/text-icon', function () {
    return view('buttons-showcase.text-icon');
})->middleware(['auth'])->name('buttons.text-icon');

Route::get("/heho",function(){

    return view("components.sidebar.sidebar");
});

Route::apiResource('products',\App\Http\Controllers\ProductController::class);



require __DIR__ . '/auth.php';
