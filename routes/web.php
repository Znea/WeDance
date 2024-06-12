<?php

use App\Http\Controllers\ClaseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentClaseController;
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
    Route::get('', [UserController::class, 'index'])->name('users.index')->middleware('admin');
    Route::post('', [UserController::class,'store'])->name('users.store')->middleware('admin');
    Route::get('/create/{rol}', [UserController::class, 'create'])->name('users.create')->middleware('admin');
    Route::get('/{user}', [UserController::class, 'show'])->name('users.show');
    Route::put('/{user}', [UserController::class, 'update'])->name('users.update')->middleware('admin');
    Route::delete('/destroy/{user}/{rol}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('admin');
    Route::get('/{user}/edit/{rol}', [UserController::class, 'edit'])->name('users.edit')->middleware('admin');
    Route::get('/modal/{user}/{rol}', [UserController::class, 'abrirModal'])->name('users.modal')->middleware('admin');
});
Route::get('/institucion', [UserController::class, 'institucion'])->name('institucion');
Route::get('/incendios-pdf', [UserController::class, 'descargarPlanIncendios'])->name('incendios')->middleware('auth');
Route::get('/teachers', [UserController::class, 'teachers'])->name('teachers');
Route::get('/students', [UserController::class, 'students'])->name('students')->middleware('admin');


// CLASES
Route::prefix('/clases')->group(function(){
    Route::get('', [ClaseController::class, 'index'])->name('clases.index');
    Route::post('', [ClaseController::class,'store'])->name('clases.store')->middleware('admin');
    Route::get('/create', [ClaseController::class, 'create'])->name('clases.create')->middleware('admin');
    Route::get('/{clase}', [ClaseController::class, 'show'])->name('clases.show');
    Route::put('/{clase}', [ClaseController::class, 'update'])->name('clases.update')->middleware('admin');
    Route::delete('/destroy/{clase}', [ClaseController::class, 'destroy'])->name('clases.destroy')->middleware('admin');
    Route::get('/{clase}/edit', [ClaseController::class, 'edit'])->name('clases.edit')->middleware('admin');
    Route::get('/modal/{clase}/{sitio}', [ClaseController::class, 'abrirModal'])->name('clases.modal')->middleware('admin');
    Route::put('/eliminarProfesor/{clase}', [ClaseController::class, 'eliminarProfesor'])->name('clases.quitarProfesor')->middleware('admin');
    Route::put('/asignarProfesor/{clase}', [ClaseController::class, 'asignarProfesor'])->name('clases.asignarProfesor')->middleware('admin');
    Route::get('/verAlumnos/{clase}', [ClaseController::class, 'verAlumnos'])->name('clases.alumnos')->middleware('auth');
});

// STUDENTS_CLASES
Route::prefix('/student_clases')->group(function(){
    Route::get('/{vista}', [StudentClaseController::class, 'index'])->name('studentClases.index');
    Route::post('/{clase}', [StudentClaseController::class,'store'])->name('studentClases.store')->middleware('auth');
    Route::get('/{clase}', [StudentClaseController::class, 'show'])->name('studentClases.show');
    Route::put('/{clase}', [StudentClaseController::class, 'update'])->name('studentClases.update')->middleware('auth');
    Route::delete('/destroy/{clase}/{vista}', [StudentClaseController::class, 'destroy'])->name('studentClases.destroy')->middleware('auth');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
