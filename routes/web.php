<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserAppController;

Route::get('user_apps', [UserAppController::class, 'index'])->name('user_apps.index');
Route::get('user_apps/{user_app}', [UserAppController::class, 'show'])->name('user_app.show');







