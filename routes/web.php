<?php

use App\Http\Controllers\Admin\AdController;
use App\Http\Controllers\BussinseController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Manage\ProductsManagerController;
use App\Http\Controllers\Manage\ServicesManagerController;
use App\Http\Controllers\MarktsController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductOrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceOrderController;
use App\Http\Controllers\UploadeController;
use App\Http\Livewire\Cart\CartTable;
use App\Http\Livewire\Manage\Product\ProductForm;
use App\Http\Livewire\Manage\Service\ServiceForm;
use App\Http\Livewire\Orders\Product\ProductOrders;
use App\Http\Livewire\Orders\Service\ServiceOrders;
use App\Models\ProductOrder;
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








Route::post('/block',[App\Http\Controllers\Block\BlockingController::class,'block'])->name("block");
Route::post("/create_chatroom",[App\Http\Controllers\ChatController::class,'create_chatroom'])->name("create_chatroom")->middleware("auth");

Route::post("/chatroom_message",[App\Http\Controllers\Api\Chat\ChatController::class,'chatroom_messages'])->name("chatroom_messagel");

Route::post("/user_chat",[App\Http\Controllers\Api\Chat\ChatController::class,'user_chat'])->name("user_chatl");
Route::apiResource('chatt',App\Http\Controllers\Api\Chat\ChatController::class);
Route::get("/inbox/{type?}/{chattings?}/{chat_room_id?}",[App\Http\Controllers\ChatController::class,"index"])->name('inbox')->middleware("auth")->where('any', '.*');











Route::get("/contact",[ContactUsController::class,'contact'])->name('contact');
Route::post("/create_contact",[ContactUsController::class,'create_contact'])->name('post.create_contact');


//about us
Route::view('/aboutUs','AboutUs');












Route::view('/cart', 'cart')->name('cart');

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


Route::get("/b/@{username}",[BussinseController::class,'show'])->name("b.show");

Route::post("/uploade",[UploadeController::class,'store'])->name("uploade");
Route::post("/delete.uploade",[UploadeController::class,'delete'])->name("delete.uploade");




Route::get('/search',[SearchController::class,'index'])->name('search');

Route::get('/search-product',[SearchController::class,'product_search'])->name('search-product');
Route::get('/search-service',[SearchController::class,'service_search'])->name('search-service');
Route::get('/search-bussinse',[SearchController::class,'bussinse_search'])->name('search-bussinse');



Route::middleware(['auth'])->group(function () {
    #codeon(){







        Route::get('/product-order/{product}',[ProductOrderController::class,'create'])->name('productorder.create');
        Route::get('/service-order/{service}',[ServiceOrderController::class,'create'])->name('serviceorder.create');
        Route::post('/service-order-store',[ServiceOrderController::class,'store'])->name('serviceorder.store');

        Route::post('/product-order-store',[ProductOrderController::class,'store'])->name('productorder.store');

        Route::get('/owne-product-orders',ProductOrders::class)->name('owne-product-orders');

        Route::get('/owne-service-orders',ServiceOrders::class)->name('owne-service-orders');

        //her the bussinse Manager
Route::post('/b.savechangeimgs',[BussinseController::class,'savechangeimgs'])->name('b.savechangeimgs');
Route::post("/b-follow",[BussinseController::class,'follow_bussinse'])->name("b-follow");
Route::get('/b.manage/{username?}',[BussinseController::class,'manage'])->name('b.manage');
Route::resource('/b',BussinseController::class)->only(['index','update','store','edit','create'])->name('index','b');






//Product Manager
Route::put('/product/update{product}',[ProductController::class,'update'])->name('product.update');
Route::get('/product/edit{product}',[ProductController::class,'edit'])->name('product.edit');
Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
Route::post('/product.store',[ProductController::class,'store'])->name('product.store')->middleware('auth');
Route::get('/manage/products',[ProductsManagerController::class,'manage'])->name('mange.products');
Route::get('/product.add{step?}|{username?}',ProductForm::class)->name('product.add.livewire');
//Product Manager
Route::post('/product.rate',[ProductController::class,'rate'])->name('product.rate');
Route::post('/service.rate',[ServiceController::class,'rate'])->name('service.rate');

//Service Manager
Route::put('/service/update{service}',[ServiceController::class,'update'])->name('service.update');


Route::get('/service/edit{service}',[ServiceController::class,'edit'])->name('service.edit');
Route::get('/service/create',[ServiceController::class,'create'])->name('service.create');

Route::post('/service.store',[ServiceController::class,'store'])->name('service.store')->middleware('auth');

Route::get('/manage/services',[ServicesManagerController::class,'manage'])->name('mange.services');


Route::get('/service.add{step?}|{username?}',ServiceForm::class)->name('service.add.livewire');
//Service Manager


});




Route::get('/product/{product}',[ProductController::class,'show'])->name('product.show');

Route::get('/service/{service}',[ServiceController::class,'show'])->name('service.show');






// useless routes
// Just to demo sidebar dropdown links active states.



require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
