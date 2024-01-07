<?php

use App\Http\Controllers\LetterController;
use App\Http\Controllers\LetterTypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserGuruController;        
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
    return view('home');
});


Route::prefix('/letter')->name('letter.')->group(function(){
    Route::get('/create', [LetterController::class, 'create'])->name('create');
    Route::post('/store', [LetterController::class, 'store'])->name('store');
    Route::get('/', [LetterController::class, 'index'])->name('home');
    Route::get('/edit/{id}', [LetterController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [LetterController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [LetterController::class, 'destroy'])->name('delete');
});

Route::prefix('/letter_type')->name('letter_type.')->group(function(){
    Route::get('/create', [LetterTypeController::class, 'create'])->name('create');
    Route::post('/store', [LetterTypeController::class, 'store'])->name('store');
    Route::get('/', [LetterTypeController::class, 'index'])->name('home');
    Route::get('/edit/{id}', [LetterTypeController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [LetterTypeController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [LetterTypeController::class, 'destroy'])->name('delete');
});

Route::prefix('/users')->name('users.')->group(function() {
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
    Route::get('/', [UserController::class, 'index'])->name('home');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::patch('/{id}', [UserController::class, 'update'])->name('update');
});

Route::prefix('/userg')->name('userg.')->group(function() {
    Route::get('/create', [UserGuruController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [UserGuruController::class, 'edit'])->name('edit');
    Route::delete('/delete/{id}', [UserGuruController::class, 'destroy'])->name('delete');
    Route::get('/', [UserGuruController::class, 'index'])->name('home');
    Route::post('/store', [UserGuruController::class, 'store'])->name('store');
    Route::patch('/{id}', [UserGuruController::class, 'update'])->name('update');
});