<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('schoolClass')->group(function () {
    Route::get('/index', [App\Http\Controllers\SchoolClassController::class, 'index'])->name('schoolClass.index');
    Route::post('/store', [App\Http\Controllers\SchoolClassController::class, 'store'])->name('schoolClass.store');
    Route::get('/show/{id}', [App\Http\Controllers\SchoolClassController::class, 'show'])->name('schoolClass.show');
});

Route::prefix('student')->group(function () {
    Route::get('/index', [App\Http\Controllers\StudentController::class, 'index'])->name('student.index');
    Route::post('/store', [App\Http\Controllers\StudentController::class, 'store'])->name('student.store');
    Route::get('/show/{id}', [App\Http\Controllers\StudentController::class, 'show'])->name('student.show');
    Route::get('/edit/{id}', [App\Http\Controllers\StudentController::class, 'edit'])->name('student.edit');
});

Route::prefix('discipline')->group(function () {
    Route::get('/index', [App\Http\Controllers\DisciplineController::class, 'index'])->name('discipline.index');
    Route::post('/store', [App\Http\Controllers\DisciplineController::class, 'store'])->name('discipline.store');
    Route::get('/show/{id}', [App\Http\Controllers\DisciplineController::class, 'show'])->name('discipline.show');
    Route::get('/edit/{id}', [App\Http\Controllers\DisciplineController::class, 'edit'])->name('discipline.edit');
});

Route::prefix('vote')->group(function () {
    Route::post('/student', [App\Http\Controllers\StudentController::class, 'student'])->name('vote.student');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
