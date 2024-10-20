<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\UserController;
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


Route::get('/',function () {
    return view('welcome');
});


//Route manager trang chủ
Route::prefix('/admin/home')->name('admin.home.')->group(function(){

    Route::get('/',[HomeController::class,'index'])->name('index');

    Route::get('/ChartPost',[HomeController::class,'getChartPost'])->name('ChartPost');

    Route::get('/ChartCategory',[HomeController::class,'getChartPieCategory'])->name('ChartCategory');

    Route::delete('/{id}',[HomeController::class,'destroy'])->name('destroy');
});

//Route manager post
Route::prefix('/admin/post')->name('admin.post.')->group(function(){
    
    Route::get('/',[PostController::class,'index'])->name('index');

    Route::get('/create',[PostController::class,'create'])->name('create');

    Route::post('/store',[PostController::class,'store'])->name('store');

    Route::post('searchPost',[PostController::class,'index'])->name('searchPost');

    Route::get('/{id}',[PostController::class,'edit'])->name('edit');

    Route::put('/{id}',[PostController::class,'update'])->name('update');

    Route::delete('/{id}',[PostController::class,'destroy'])->name('destroy');
});



//Route manager detail
Route::prefix('/admin/detail')->name('admin.detail.')->group(function(){
    Route::get('/',[DetailController::class,'index'])->name('index');

    Route::get('/checkPostCount/{id}',[DetailController::class,'checkPostCount'])->name('checkPostCount');

    Route::post('/store',[DetailController::class,'store'])->name('store');

    Route::put('/{id}',[DetailController::class,'update'])->name('update');

    Route::delete('/{id}',[DetailController::class,'destroy'])->name('destroy');
});

//Route manager contact
Route::prefix('/admin/contact')->name('admin.contact.')->group(function(){
    Route::get('/',[ContactController::class,'index'])->name('index');

    Route::post('/searchContact',[ContactController::class,'index'])->name('searchContact');

    Route::delete('/{id}',[ContactController::class,'destroy'])->name('destroy');
});
//Route manager subscribe
Route::prefix('/admin/subscribe')->name('admin.subscribe.')->group(function(){
    Route::get('/',[SubscribeController::class,'index'])->name('index');
});
//Route manager comment
Route::prefix('/admin/comment')->name('admin.comment.')->group(function(){
    Route::get('/',[CommentController::class,'index'])->name('index');
});


//Route manager account
Route::prefix('/admin/user')->name('admin.user.')->group(function(){
    Route::get('/',[UserController::class,'index'])->name('index');

    Route::delete('/{id}',[UserController::class,'destroy'])->name('destroy');
});