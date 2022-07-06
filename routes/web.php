<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controller\EmailContoller;
use app\Http\Controllers\PostController;
use app\Http\Controllers\PostView;
use App\Mail\NewMail;
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

Route::get('/makepost', function () {
    return view('makePost');
});
// Route::get('sending-queue-emails', [app\Http\Controllers\TestQueueEmails::class,'sendTestEmails']);


// Route::get('/readmore', function () {
//     return view('Readmore');
// });
Route::get('/send', '\App\Http\Controllers\EmailContoller@send')->name('home.send');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index', 'show'])->name('home');
Route::get('/form1',[App\Http\Controllers\PostController::class, 'create']);
Route::post('/form1',[App\Http\Controllers\PostController::class, 'store']);
 Route::get('/show',[App\Http\Controllers\PostController::class, 'show'])->name("show");

Route::get('viewpost/{id?}',[App\Http\Controllers\HomeController::class, 'show'])->name('viewpost');
Route::get('addpost',[App\Http\Controllers\PostController::class, 'showPost']);
// Route::get('/post-list',[App\Http\Controllers\HomeController::class,'postList'])->name('post.list');
Route::post('/like-post/{id}',[App\Http\Controllers\HomeController::class,'likePost'])->name('like.post');
Route::post('/unlike-post/{id}',[App\Http\Controllers\HomeController::class,'unlikePost'])->name('unlike.post');
Route::post('/read-more/{id}',[App\Http\Controllers\HomeController::class,'readmore'])->name('read-more');


Route::get('users',[App\Http\Controllers\HomeController::class,'users'])->name('users');
Route::get('user/{id}',[App\Http\Controllers\HomeController::class,'user'])->name('user.view');
Route::post('ajaxRequest',[App\Http\Controllers\HomeController::class,'ajaxRequest'])->name('ajaxRequest');




Route::get('email-test/', function(){

    Mail::to("bisho@gmail.com")->send(new NewMail());
    });




   