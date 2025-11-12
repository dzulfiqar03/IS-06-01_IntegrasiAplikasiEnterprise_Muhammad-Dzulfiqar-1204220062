<?php

use App\Http\Controllers\Prayer\PrayerTimesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [PrayerTimesController::class, 'index']);
Route::post('/show', [PrayerTimesController::class, 'show'])->name('prayer.show');
Route::redirect('/', '/index');