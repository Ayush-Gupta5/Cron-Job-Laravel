<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'Index'])->name('home');
Route::put('/update',[HomeController::class,'updateStatus']);
Route::get('/Email-Schedule',[HomeController::class,'EmailSchedule'])->name('EmailSchedule');
Route::post('/Process-Schedule',[HomeController::class,'ProcessSchedule'])->name('ProcessSchedule');
