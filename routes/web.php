<?php

use App\Http\Controllers\ClaseController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('index');
})->name('/');

Route::get('/home', function () {
    return view('index');
})->name('home');

// USUARIOS
Route::prefix('/users')->group(function(){
    Route::get('', [UserController::class, 'index'])->name('users.index');
    Route::post('', [UserController::class,'store'])->name('users.store')->middleware('admin');
    Route::get('/create', [UserController::class, 'create'])->name('users.create')->middleware('admin');
    Route::get('/{user}', [UserController::class, 'show'])->name('users.show');
    Route::put('/{user}', [UserController::class, 'update'])->name('users.update')->middleware('admin');
    Route::delete('/destroy/{user}/{rol}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('admin');
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('admin');
    Route::get('/modal/{user}/{rol}', [UserController::class, 'abrirModal'])->name('users.modal')->middleware('admin');
});
Route::get('/teachers', [UserController::class, 'teachers'])->name('teachers');
Route::get('/students', [UserController::class, 'students'])->name('students');


// CLASES
Route::prefix('/clases')->group(function(){
    Route::get('', [ClaseController::class, 'index'])->name('clases.index');
    Route::post('', [ClaseController::class,'store'])->name('clases.store')->middleware('admin');
    Route::get('/create', [ClaseController::class, 'create'])->name('clases.create')->middleware('admin');
    Route::get('/{clase}', [ClaseController::class, 'show'])->name('clases.show');
    Route::put('/{clase}', [ClaseController::class, 'update'])->name('clases.update')->middleware('admin');
    Route::delete('/destroy/{clase}', [ClaseController::class, 'destroy'])->name('clases.destroy')->middleware('admin');
    Route::get('/{clase}/edit', [ClaseController::class, 'edit'])->name('clases.edit')->middleware('admin');
    Route::get('/modal/{clase}', [ClaseController::class, 'abrirModal'])->name('clases.modal')->middleware('admin');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
