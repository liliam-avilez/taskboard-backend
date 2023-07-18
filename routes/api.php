<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\LabelsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TasksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/user', [UserController::class, 'store']);
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/tasks/{id}', [TasksController::class, 'show']);
    Route::get('/tasks', [TasksController::class, 'index']);
    Route::put('/tasks/{id}', [TasksController::class, 'update']);
    Route::put('/deleteTask/{id}', [TasksController::class, 'softDelete']);
    Route::put('/updateProgress/{id}', [TasksController::class, 'updateProgress']);
    Route::put('/tasks', [TasksController::class, 'store']);
    Route::get('/searchTasks/{search}', [TasksController::class, 'searchTask']);

    Route::get('/labels', [LabelsController::class, 'index']);
    Route::post('/labels', [LabelsController::class, 'store']);
    Route::Put('label/{id}', [LabelsController::class, 'update']);
    Route::put('deleteLabel/{id}', [LabelsController::class, 'softDelete']);
});


Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
