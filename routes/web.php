<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//    return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('{page}', [MainController::class, 'index'])->where('page', '.*');

Route::post('/reports/generate', [ReportController::class, 'generateReport'])
    ->middleware('auth')
    ->name('reports.generate');
