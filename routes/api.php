<?php
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::get('/api/show',[App\Http\Controllers\PostController::class, 'show'])->name("show");
// Route::get('/api/login',[App\Http\Controllers\Auth\LoginController::class, 'showLogin'])->name("showLogin");
// Route::post('/api/login',[App\Http\Controllers\Auth\LoginController::class, 'login'])->name("login");




Route::post('/api/register', [App\Http\Controllers\AuthController::class, 'register']);
//API route for login user
Route::post('/api/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('api/profile', function(Request $request) {
        return auth()->user();
    });

    // API route for logout user
    Route::post('api/logout', [App\Http\Controllers\AuthController::class, 'logout']);
});

use App\Http\Controllers\JWTController;
Route::post('/registerjwt', [JWTController::class, 'register']);
Route::post('/loginjwt', [JWTController::class, 'login']);

Route::post('/refreshjwt', [JWTController::class, 'refresh']);

Route::group(['middleware' => 'api'], function($router) {
    
    Route::post('/profilejwt', [JWTController::class, 'profile']);
    Route::post('/logoutjwt', [JWTController::class, 'logout']);
});