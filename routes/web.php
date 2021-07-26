<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

   Route::group(['prefix'=>'admin','middleware'=>['isAdmin','auth']],function (){
   Route::get('dashboard',[\App\Http\Controllers\AdminController::class,'index'])->name('admin.dashboard');
   Route::get('/add-attribute',[\App\Http\Controllers\AttributeController::class,'index']);
   Route::post('/add_attribute',[\App\Http\Controllers\AttributeController::class,'addAttribute']);
   Route::get('/add-attribute-value',[\App\Http\Controllers\AttributeController::class,'addValue']);
   Route::post('/add_attribute_value',[\App\Http\Controllers\AttributeController::class,'addAttributeValue']);
   Route::get('/get_attribute_value/{id}',[\App\Http\Controllers\AdminController::class,'getattributeValue']);
   Route::post('/add-product',[\App\Http\Controllers\ProductController::class,'addProduct']);
});

     Route::group(['prefix'=>'user','middleware'=>['isUser','auth']],function (){
     Route::get('dashboard',[\App\Http\Controllers\UserController::class,'index'])->name('user.dashboard');
     Route::get('/categories/{category_id}',[\App\Http\Controllers\UserController::class,'categories']);
     Route::get('/color/{attribute_value_id}',[\App\Http\Controllers\UserController::class,'colorFilter']);
     Route::get('/size/{attribute_value_id}',[\App\Http\Controllers\UserController::class,'sizeFilter']);
     Route::get('/index',[\App\Http\Controllers\UserController::class,'main']);



});
