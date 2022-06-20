<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\Authenticate;


//Authentication Routes

Route::get('/login',[AuthController::class,'index'])->name('login');
Route::post('/loginOP',[AuthController::class,'authenticate'])->name('auth');
Route::get('/registerForm',[AuthController::class,'reg'])->name('newuserForm');
Route::post('/registerNew',[AuthController::class,'register'])->name('newuser');

//Authenticated Route
Route::group(['middleware' =>['auth']],function(){
    Route::get('/', [MainController::class,'index'])->name('dashboard');
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
});
