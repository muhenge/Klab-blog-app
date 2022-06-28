<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\PostController;
use App\Http\Controllers\weetalertController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use  App\Http\Controllers\Auth\RegisterController;
use  App\Http\Controllers\studentController;



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
///readmore routesCallback
Route::post('readMore/{id?}',[ App\Http\Controllers\ArticleController::class,'readMore'])->name('readMore');

});
Route::post('code',[App\Http\Controllers\QrcodeController::class,'index'])->name('code');
Route::get('sendEmail',[App\Http\Controllers\ArticleController::class,'sendEmail'])->name('sendEmail');
Route::get('like',[App\Http\Controllers\likeController::class,'likeAction'])->name('like');
Route::post('store',[App\Http\Controllers\likeController::class,'store'])->name('store');
Route::get('st',[App\Http\Controllers\studentController::class,"index"])->name('st');
Auth::routes();



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('aaa',[ App\Http\Controllers\ArticleController::class,'index'])->name('aaa');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::get('email-test', function(){
    $details['email'] = 'karekezigustave@gmail.com';
    dispatch(new App\Jobs\SendEmailJob($details));
    dd('done');

});