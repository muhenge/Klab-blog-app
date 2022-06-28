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
    Route::get('/users', [MainController::class,'users'])->name('users.all');
    Route::get('/blogs/{id?}', [MainController::class,'likeBlog'])->name('blog.lik');
    Route::post('/changeInfo', [MainController::class,'changeInfo'])->name('user.setting2');
    Route::post('/changePass', [MainController::class,'changePasscode'])->name('user.password');
    Route::post('/saveBlog', [MainController::class,'saveBlog'])->name('blog.save');
    Route::get('/updateForm/{id?}', [MainController::class,'updateForm'])->name('blog.form');
    Route::post('/updateBlog', [MainController::class,'blogUpdate'])->name('blog.update');
    Route::post('/deleteBlog', [MainController::class,'blogDelete'])->name('blog.delete');
    Route::get('/userProfile', [MainController::class,'profile'])->name('user.profile');
    Route::get('/blog/{id?}', [MainController::class,'read'])->name('blog.read');
    Route::get('/read/{id?}', [MainController::class,'blog'])->name('view.blog');
    Route::get('/information', [MainController::class,'info'])->name('information');
    Route::post('/saveInfo', [MainController::class,'save'])->name('user.info');


    Route::get('/logout',[AuthController::class,'logout'])->name('logout');  
});
