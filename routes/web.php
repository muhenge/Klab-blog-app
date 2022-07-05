<?php

use Illuminate\Support\Facades\Route;
use App\Mail\ArticleEmail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\FollowController;

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

Route::get('/send-mail', function () {
    Mail::to("bishomoise@gmail.com")->send(new ArticleEmail());
});

// Authonticated Middleware
Route::middleware(['auth'])->group(function(){

    //Articles Route
Route::get('/articles', [ArticleController::class, 'index'])->name('articlesIndex');
Route::get('/articlesAll', [ArticleController::class, 'indexAll'])->name('articlesAll');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articlesCreate');
Route::post('/articles', [ArticleController::class, 'store'])->name('articlesStore');
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articlesShow');
Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articlesEdit');
Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('articlesUpdate');
Route::get('/articles/{id}', [ArticleController::class, 'destroy'])->name('articlesDelete');
Route::get('/articles{id}/title', [ArticleController::class, 'title'])->name('articleTitle');
Route::get('/articles{id}/articles', [ArticleController::class, 'content'])->name('articleContent');
Route::get('/articles{id}/articlesAll', [ArticleController::class, 'contentAll'])->name('articleContentAll');

//Users route
Route::get('/users', [UserController::class, 'index'])->name('userIndex');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('userEdit');
Route::get('/users/{id}', [UserController::class, 'show'])->name('userShow');
Route::put('/users/{id}', [UserController::class, 'update'])->name('userUpdate');
Route::put('/user/{id}', [UserController::class, 'Password'])->name('changePassword');


//Like routes
Route::get('/like/{id}/like', [LikeController::class, 'like'])->name('likeIndex');
Route::get('/like/{id}/likeAll', [LikeController::class, 'likeAll'])->name('likeIndexAll');
Route::get('/likes/{id}/likesAll', [LikeController::class, 'Dislike'])->name('dislikeIndex');
Route::get('/likes/{id}/likes', [LikeController::class, 'DislikeAll'])->name('dislikeIndexAll');

//Follow Routes
Route::get('/follow/{id}', [FollowController::class, 'Follow'])->name('followIndex');
Route::get('/unfollow/{id}', [FollowController::class, 'Unfollow'])->name('unfollowIndex');


});


Auth::routes();

Route::get('/home', [App\Http\Controllers\UserController::class, 'index'])->name('home');
