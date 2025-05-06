<?php

use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get(config('global.SINUSER'), [App\Http\Controllers\HomeController::class, 'inicio'])->name('inicio');
Route::get(config('global.NORMAL'), [App\Http\Controllers\HomeController::class, 'inicioUser'])->name('inicioUser');
Route::get(config('global.ADMINISTRADOR'), [App\Http\Controllers\HomeController::class, 'inicioAdmin'])->name('inicioAdmin');
Route::get(config('global.ROOT'), [App\Http\Controllers\HomeController::class, 'inicioRoot'])->name('inicioRoot');


