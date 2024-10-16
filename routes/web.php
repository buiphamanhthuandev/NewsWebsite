<?php

use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
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
    return view('new.home.index');
});


//Route manager trang chủ
Route::prefix('/admin/home')->name('admin.home.')->group(function(){

    Route::get('/',[HomeController::class,'index'])->name('index');

    Route::post('/searchContact',[HomeController::class,'index'])->name('searchContact');

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

    Route::post('searchDetail',[DetailController::class,'index'])->name('searchDetail');

    Route::post('/store',[DetailController::class,'store'])->name('store');

    Route::put('/{id}',[DetailController::class,'update'])->name('update');

    Route::delete('/{id}',[DetailController::class,'destroy'])->name('destroy');
});