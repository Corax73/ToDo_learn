<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::apiResource('tasks', TaskApiController::class);

Route::controller(TaskApiController::class)
->group(function () {
    Route::get('/tasks/{token}', 'all');
    Route::get('/tasks/{token}/user/{id}', 'oneUser');
    Route::get('/tasksByScope/{token}/user/{id}', 'oneByScope');
    Route::get('/nameandemail/{token}/user/{id}', 'getNameAndEmailUser');
    Route::get('/nameup/{token}/user/{id}', 'getNameUpUser');
});