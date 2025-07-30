<?php

use App\Http\Controllers\RecommendationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAppController;

Route::get('user_apps', [UserAppController::class, 'index'])->name('user_apps');
Route::get('user_apps/{user_app}', [UserAppController::class, 'show'])->name('user_app.show');

Route::get('recommendations', [RecommendationController::class, 'index'])->name('recommendations');
Route::get('recommendations/{recommendation}', [RecommendationController::class, 'show'])->name('recommendation.show');

