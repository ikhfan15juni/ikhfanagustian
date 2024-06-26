<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\LetterTypeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;




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
    return view('layouts.template')->middleware('guest');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('guest');



Route::prefix('/user')->name('user.')->group(function(){
    Route::get('/users', [UserController::class, 'index'])->name('index')->middleware('guest');
    Route::get('/create', [UserController::class, 'create'])->name('create')->middleware('guest');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit')->middleware('guest');
    //mengubah data db
    Route::patch('/update/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
});

Route::prefix('/guru')->name('guru.')->group(function(){
    Route::get('/', [GuruController::class, 'index'])->name('index')->middleware('guest');
    Route::get('/create', [GuruController::class, 'create'])->name('create')->middleware('guest');
    Route::post('/store', [GuruController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [GuruController::class, 'edit'])->name('edit')->middleware('guest');
    //mengubah data db
    Route::patch('/update/{id}', [GuruController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [GuruController::class, 'destroy'])->name('delete');
});

Route::prefix('/letter')->name('lettertype.')->group(function(){
    Route::get('/', [LetterTypeController::class, 'index'])->name('index')->middleware('guest');
    Route::get('/create', [LetterTypeController::class, 'create'])->name('create')->middleware('guest');
    Route::post('/store', [LetterTypeController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [LetterTypeController::class, 'edit'])->name('edit')->middleware('guest');
    //mengubah data db
    Route::patch('/update/{id}', [LetterTypeController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [LetterTypeController::class, 'destroy'])->name('delete');
});

Route::prefix('/login')->name('login.')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
    Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
});

Route::post('/logout', [LoginController::class, 'logout']);


