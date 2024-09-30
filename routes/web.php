<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/join-as', [AuthController::class, 'joinAs'])->name('join-as');

Route::post('/join-as', [AuthController::class, 'joinAs'])->name('join-as');

Route::get('/home', function() {
    return view('home');
});

Route::get('/logout', [AuthController::class, 'logout']);


