<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;

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
// Authonticated Middleware
Route::middleware(['auth'])->group(function(){

    //Articles Route
Route::get('/articles', [ArticleController::class, 'index'])->name('articlesIndex');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articlesCreate');
Route::post('/articles', [ArticleController::class, 'store'])->name('articlesStore');
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articlesShow');
Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articlesEdit');
Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('articlesUpdate');
Route::get('/articles/{id}', [ArticleController::class, 'destroy'])->name('articlesDelete');
Route::get('/articles{id}/title', [ArticleController::class, 'title'])->name('articleTitle');
Route::get('/articles{id}/articles', [ArticleController::class, 'content'])->name('articleContent');

//Users route
Route::get('/users', [UserController::class, 'index'])->name('userIndex');
// Route::get('/users/register', [UserController::class, 'register'])->name('userRegister');

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\UserController::class, 'index'])->name('home');
