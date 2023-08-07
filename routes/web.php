<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/posts', [PostsController::class, 'index']);
Route::get('/posts/{id}', [PostsController::class, 'show']);
Route::get('/createpost', [PostsController::class, 'createPost']);
Route::post('/createpost', [PostsController::class, 'store']);

Route::get('/register', [AuthController::class, 'showRegisterPage']);
Route::get('/login', [AuthController::class, 'showLoginPage']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);