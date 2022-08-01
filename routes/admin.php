<?php

use App\Http\Controllers\Admin\AdController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MarktsController;
use App\Http\Controllers\PartController;
use App\Http\Livewire\Admin\ManageBussinse;
use App\Http\Livewire\Admin\ManageProduct;
use App\Http\Livewire\Admin\ManageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::group(['middleware' => ['role:admin']], function () {
    // ad
    Route::resource('ad',AdController::class)->name('index','ad');



// City
Route::get("/add_city",[CityController::class,'index'])->name("show_city");
Route::post("/add_city/storg",[CityController::class,'store'])->name("save_city");
Route::get("/show_city/delete{id}",[CityController::class,'delete'])->name("delet");
Route::get("/show_city/edit{id}",[CityController::class,'edit'])->name("edit");
Route::post("/show_city/update{id}",[CityController::class,'update'])->name("update");

// Department
Route::get("/Department_add",[DepartmentController::class,'index'])->name("show_Department");
Route::post("/Department_add/storg",[DepartmentController::class,'store'])->name("save_Department");
Route::get("/Department_show/delete{id}",[DepartmentController::class,'delete'])->name("delet_Department");
Route::get("/Department_show/edit{id}",[DepartmentController::class,'edit'])->name("edit_Department");
Route::post("/Department_show/update{id}",[DepartmentController::class,'update'])->name("update_Department");

// Markts
Route::get("/markts_add",[MarktsController::class,'index'])->name("show_markts");
Route::post("/markts_add/storg",[MarktsController::class,'store'])->name("save_markts");
Route::get("/markts_show/delete{id}",[MarktsController::class,'delete'])->name("delet_markts");
Route::get("/markts_show/edit{id}",[MarktsController::class,'edit'])->name("edit_markts");
Route::post("/markts_show/update{id}",[MarktsController::class,'update'])->name("update_markts");

// Part

Route::get("/Parts_add",[PartController::class,'index'])->name("show_Parts");
Route::post("/Parts_add/storg",[PartController::class,'store'])->name("save_Parts");
Route::get("/Parts_show/delete{id}",[PartController::class,'delete'])->name("delet_Parts");
Route::get("/Parts_show/edit{id}",[PartController::class,'edit'])->name("edit_Parts");
Route::post("/Parts_show/update{id}",[PartController::class,'update'])->name("update_Parts");
// Route::apiResource('products',\App\Http\Controllers\ProductController::class);



Route::get("/show_contact",[ContactUsController::class,'show_con'])->name('post.show_con');
Route::get("/messegeRep",[ContactUsController::class,'replay_con'])->name('post.messegeRep');
Route::post("/update_con",[ContactUsController::class,'update_con'])->name('post.update_con');

Route::get('/admin.manage.products',ManageProduct::class)->name('admin.manage.products');

Route::get('/admin.manage.services',ManageService::class)->name('admin.manage.services');


Route::get('/admin.manage.bussinses',ManageBussinse::class)->name('admin.manage.bussinses');




});




Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('permissions', PermissionsController::class);
    Route::delete('permissions_mass_destroy', [PermissionsController::class,'massDestroy'])->name('permissions.mass_destroy');
    Route::delete('roles_mass_destroy', [RolesController::class,'massDestroy'])->name('roles.mass_destroy');
    Route::resource('roles', RolesController::class);
    Route::delete('users_mass_destroy', [UsersController::class,'massDestroy'])->name('users.mass_destroy');
    Route::get('users_ban/{user}',[UsersController::class,'ban'])->name('users.ban.show');
    Route::post('users_ban/{user}',[UsersController::class,'ban_store'])->name('users.ban.post');

    Route::resource('users', UsersController::class);
    Route::get('home',[MainController::class,'index'])->name('home');



});
