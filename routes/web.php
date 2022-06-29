<?php

use App\Http\Controllers\ArticalCtrl;
use App\Http\Controllers\AuthCtrl;
use App\Http\Controllers\LikerController;
use App\Http\Controllers\LoginCtrl;
use App\Http\Controllers\LogoutCtrl;
use App\Http\Controllers\RegisterCtrl;
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

Route::get('/',[ArticalCtrl::class,'index'])->name('home')->middleware('myauth');
Route::get('/dashboard', [ArticalCtrl::class, 'getUsers'])->name('dashboard')->middleware('myauth');
Route::put('/like/{id}', [LikerController::class,'likeArticle'])->name('like')->middleware('like');
//AUTH

Route::get('/login',[LoginCtrl::class,'show'])->name('loginForm');
Route::post('/login',[LoginCtrl::class,'login'])->name('login');
Route::get('/register',[RegisterCtrl::class,'show'])->name('registration');
Route::post('/register',[RegisterCtrl::class,'register'])->name('register');
Route::get('/logout',[LogoutCtrl::class,'logout'])->name('logout');

Route::resource('/artical',ArticalCtrl::class)->middleware('myauth');