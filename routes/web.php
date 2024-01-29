<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogicController;

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
    return view('welcome');
});

Route::get('/login', [LogicController::class, 'login'])->name('login');
Route::post('/login', [LogicController::class, 'loginPost'])->name('login.post');

Route::get('/register', [LogicController::class, 'register'])->name('register');
Route::post('/register', [LogicController::class, 'registerForm'])->name('register.form');

Route::get('/logout', [LogicController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/{name}', [LogicController::class, 'dashboard'])->name('dashboard');
});