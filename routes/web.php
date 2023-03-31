<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\NewsController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(TaskController::class)
->group(function () {
    Route::get('/tasks', 'index') -> name('tasks.index');
    Route::post('/saveTask', 'saveTask') -> name('tasks.save');
    Route::post('destroy/{id}', 'destroy') -> name('tasks.destroy');
});


Route::controller(NewsController::class)
->group(function() {
    Route::get('/news', 'index') -> name('news.index');
    Route::get('/news/{id}', 'show') -> name('news.show');
    Route::post('/news', 'store') -> name('news.store');
    Route::delete('destroy/{id}', 'destroy') -> name('news.destroy');
    Route::get('/news/{id}/edit', 'edit') -> name('news.edit');
    Route::patch('/news/{id}', 'update') -> name('news.update');
});
