<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

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

Route::get('/articles', [ArticleController::class, 'index'])->name('articlesIndex');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articlesCreate');
Route::post('/articles', [ArticleController::class, 'store'])->name('articlesStore');
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articlesShow');
Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articlesEdit');
Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('articlesUpdate');
Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('articlesDestroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
