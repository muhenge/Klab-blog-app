<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\PostController;
use App\Http\Controllers\weetalertController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;

use  App\Http\Controllers\Auth\RegisterController;




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
    return view('welcome');
});




Route::group(['middleware' =>['auth']],function(){


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::get('/gustave', [App\Http\Controllers\PostController::class, 'ddj'])->name('gustave');
Route::get('/alert/{AlertType}', [App\Http\Controllers\sweetalertController::class, 'alert'])->name('alert');
Route::post('registerArticle',[ ArticleController::class,'store'])->name('registerArticle');
Route::get('article',[ App\Http\Controllers\ArticleController::class,'articleform'])->name('alerticle');
Route::get('articleList/{id?}',[ App\Http\Controllers\ArticleController::class,'articleList'])->name('articleList');
Route::get('list',[ UserController::class,'list'])->name('list');
Route::delete('delete/{id}',[App\Http\Controllers\ArticleController::class,'destroy'])->name('delete');
Route::post('update1',[UserController::class,'update'])->name('update1');


});
Route::get('code',[App\Http\Controllers\QrcodeController::class,'index'])->name('code');


Auth::routes();



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('aaa',[ App\Http\Controllers\ArticleController::class,'index'])->name('aaa');

