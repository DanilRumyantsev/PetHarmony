<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('{page}', [MainController::class, 'index'])->where('page', '.*');
