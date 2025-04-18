<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\CategoryController;
Use App\Http\Controllers\HealthRecordController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/get', [GetController::class, '__invoke']);
});

// Вывод существующих пользователей
Route::middleware('auth:sanctum')->get('/user', [UserController::class, 'show']);

// Маршрут для создания и привязки животного к пользователю
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/pets', [PetController::class, 'index']);
    Route::post('/pets', [PetController::class, 'store']);
    Route::put('/pets/{id}', [PetController::class, 'update']);
    Route::delete('/pets/{id}', [PetController::class, 'destroy']);
    Route::put('/health_records/{id}', [HealthRecordController::class, 'update']);
    Route::post('/health_records', [HealthRecordController::class, 'store']);
});

// Маршрут для вывода и создания категорий
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);
    Route::put('/categories/{id}', [CategoryController::class, 'update']);
});