<?php

use App\Http\Controllers\AddPostController;
use App\Http\Controllers\Auth\EditProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashbroadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\likeController;
use App\Http\Controllers\ManagerPostsController;
use App\Http\Controllers\ManagerUsersController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserProfileController;

// use Illuminate\Routing\Route;

// use Illuminate\Routing\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashbroad', [DashbroadController::class, 'index'])->name('dashbroad');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/post/all', [ManagerPostsController::class, 'index'])->name('manager');

Route::get('/post/new', [AddPostController::class, 'index'])->name('addPost');
Route::post('/post/new', [AddPostController::class, 'save']);

Route::get('/post/{id}', [PostController::class, 'index'])->name('post');

Route::get('/like/{id}', [likeController::class, 'like'])->name('like');

Route::get('/users', [ManagerUsersController::class, 'index'])->name('users');

Route::get('/user/edit', [EditProfileController::class, 'index'])->name('editProfile');

Route::get('/profile/{id}', [UserProfileController::class, 'index'])->name('userProfile');
