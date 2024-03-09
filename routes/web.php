<?php

use App\Http\Controllers\Commentcontroller;
use App\Http\Controllers\TaskController;
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
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => ['auth']], function () {

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index'])->name('tasks.index');
//Route::get('/tasks/create', [App\Http\Controllers\TaskController::class, 'create'])->name('task.create');
//Route::post('/tasks/store', [App\Http\Controllers\TaskController::class, 'store'])->name('task.store');
//Route::post('/tasks/show', [App\Http\Controllers\TaskController::class, 'store'])->name('task.store');
//Route::resource('tasks', App\Http\Controllers\TaskController::class);


Route::resource('tasks', TaskController::class);
Route::resource('comments', CommentController::class);

//Route::PUT('/test', [TaskController::class, 'update'])->name('test');

});
