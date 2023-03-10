<?php

use App\Http\Controllers\AdeareaController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\SheetController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;

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
    return view('auth/login'); // mettre "welcome" pour arriver sur la page d'accueil laravel et non pas sur le login jetstream
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/adearea', [AdeareaController::class, 'index'])->name('adearea.index');
Route::get('/adearea/{adearea}', [AdeareaController::class, 'show'])->name('adearea.show');

Route::get('/area/create', [AreaController::class, 'create'])->name('area.create');
Route::get('/area', [AreaController::class, 'index'])->name('area.index');
Route::post('/area/store', [AreaController::class, 'store'])->name('area.store');
Route::get('/area/{area}', [AreaController::class, 'show'])->name('area.show');
Route::get('/area/{area}/edit', [AreaController::class, 'edit'])->name('area.edit');
Route::put('/area/{area}/edit', [AreaController::class, 'update'])->name('area.update');
Route::delete('area/{area}', [AreaController::class, 'destroy'])->name('area.destroy');

Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');
Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{user}/edit', [UserController::class, 'update'])->name('user.update');
Route::delete('user/{user}', [UserController::class, 'destroy'])->name('user.destroy');

Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
Route::get('/student', [StudentController::class, 'index'])->name('student.index');
Route::post('/student/store', [StudentController::class, 'store'])->name('student.store');
Route::get('/student/{student}', [StudentController::class, 'show'])->name('student.show');
Route::get('/student/{student}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/student/{student}/edit', [StudentController::class, 'update'])->name('student.update');
Route::delete('student/{student}', [StudentController::class, 'destroy'])->name('student.destroy');

Route::get('/teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher.index');
Route::post('/teacher/store', [TeacherController::class, 'store'])->name('teacher.store');
Route::get('/teacher/{teacher}', [TeacherController::class, 'show'])->name('teacher.show');
Route::get('/teacher/{teacher}/edit', [TeacherController::class, 'edit'])->name('teacher.edit');
Route::put('/teacher/{teacher}/edit', [TeacherController::class, 'update'])->name('teacher.update');
Route::delete('teacher/{teacher}', [TeacherController::class, 'destroy'])->name('teacher.destroy');

Route::get('/projet/create', [ProjetController::class, 'create'])->name('projet.create');
Route::get('/projet', [ProjetController::class, 'index'])->name('projet.index');
Route::post('/projet/store', [ProjetController::class, 'store'])->name('projet.store');
Route::get('/projet/{projet}', [ProjetController::class, 'show'])->name('projet.show');
Route::get('/projet/{projet}/edit', [ProjetController::class, 'edit'])->name('projet.edit');
Route::put('/projet/{projet}/edit', [ProjetController::class, 'update'])->name('projet.update');
Route::delete('projet/{projet}', [ProjetController::class, 'destroy'])->name('projet.destroy');

Route::get('/sheet/create', [SheetController::class, 'create'])->name('sheet.create');
Route::get('/sheet', [SheetController::class, 'index'])->name('sheet.index');
Route::post('/sheet/store', [SheetController::class, 'store'])->name('sheet.store');
Route::get('/sheet/{sheet}', [SheetController::class, 'show'])->name('sheet.show');
Route::get('/sheet/{sheet}/edit', [SheetController::class, 'edit'])->name('sheet.edit');
Route::put('/sheet/{sheet}/edit', [SheetController::class, 'update'])->name('sheet.update');
Route::delete('sheet/{sheet}', [SheetController::class, 'destroy'])->name('sheet.destroy');
