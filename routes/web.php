<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homecontroller;
use App\Http\Controllers\formcontroller;
use App\Http\Controllers\maincontroller;
use App\Models\todos;
use App\Http\Controllers\searchcontroller;


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

Route::get('/',[homecontroller::class,'index']);
Route::get('/new',[formcontroller::class,'addnew']);
Route::post('/new',[formcontroller::class,'create'])->name('create');
Route::get('/delete/{id}',[formcontroller::class,'destroy']);
Route::get('/login',[maincontroller::class,'login']);
Route::get('/signup',[maincontroller::class,'rigister']);
Route::Post('/save',[maincontroller::class,'save'])->name('save');
Route::Post('/check',[maincontroller::class,'check'])->name('check');
Route::get('/search',[searchcontroller::class,'search'])->name('search');;
