<?php

use App\Http\Controllers\AgronomyController;
use App\Http\Controllers\AnimalProductionController;
use App\Http\Controllers\AvocadoCropController;
use App\Http\Controllers\CattleController;
use App\Http\Controllers\CoffeCropController;
use App\Http\Controllers\CropController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\HenController;
use App\Http\Controllers\RecommendationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClimaController;
use App\Http\Controllers\FinanceClienteController;

// En routes/web.php
Route::get('user_apps', [UserAppController::class, 'index'])
    ->name('user_apps');
Route::get('user_apps/{user_app}', [UserAppController::class, 'show'])->name('user_app.show');

Route::get('/recommendations', [RecommendationController::class, 'index'])->name('recommendations.index');
Route::post('/recommendations', [RecommendationController::class, 'store'])->name('recommendations.store');

Route::get('hens', [HenController::class, 'index'])->name('hens');
Route::get('hens/{hen}', [HenController::class, 'show'])->name('hen.show');

// Route::get('finances', [FinanceController::class, 'index'])->name('finances');
// Route::get('finances/{finance}', [FinanceController::class, 'show'])->name('finance.show');

Route::get('crops', [CropController::class, 'index'])->name('crops');
Route::get('crops/{crop}', [CropController::class, 'show'])->name('crop.show');

Route::get('coffe_crops', [CoffeCropController::class, 'index'])->name('coffecrops');
Route::get('coffe_crops/{coffecrop}', [CoffeCropController::class, 'show'])->name('coffecrop.show');

Route::get('cattles', [CattleController::class, 'index'])->name('cattles');
Route::get('cattles/{cattle}', [CattleController::class, 'show'])->name('cattle.show');

Route::get('avocadocrops', [AvocadoCropController::class, 'index'])->name('avocadocrops');
Route::get('avocadocrops/{avocadocrop}', [AvocadoCropController::class, 'show'])->name('avocadocrop.show');

Route::get('animalproductions', [AnimalProductionController::class, 'index'])->name('animalproductions');
Route::get('animalproductions/{animalproduction}', [AnimalProductionController::class, 'show'])->name('animalproduction.show');    

//diseño
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [AuthController::class, 'home'])->name('home');

Route::get('/editar-perfil', [AuthController::class, 'showEditProfile'])->name('perfil.editar');
Route::post('/editar-perfil', [AuthController::class, 'updateProfile'])->name('perfil.actualizar');




// // Cliente Finanzas
// Route::get('/client/finances', [FinanceClienteController::class, 'index'])->name('client.index');
// Route::post('/client/finances', [FinanceClienteController::class, 'store'])->name('client.store');

// // Historial
// Route::get('/finances', [FinanceClienteController::class, 'index'])->name('client.index');
// Route::post('/finances', [FinanceClienteController::class, 'store'])->name('client.store');

// // Formularios separados
// Route::view('/incomes', 'client.incomes')->name('client.incomes');
// Route::view('/expenses', 'client.expenses')->name('client.expenses');


Route::get('/finances', [FinanceClienteController::class, 'index'])->name('client.index');

// Formularios
Route::get('/finances/income/create', [FinanceClienteController::class, 'createIncome'])->name('client.income.create');
Route::post('/finances/income', [FinanceClienteController::class, 'storeIncome'])->name('client.income.store');

Route::get('/finances/expense/create', [FinanceClienteController::class, 'createExpense'])->name('client.expense.create');
Route::post('/finances/expense', [FinanceClienteController::class, 'storeExpense'])->name('client.expense.store');


Route::get('/recommendations', [RecommendationController::class, 'index'])->name('recommendations.index');
Route::post('/recommendations', [RecommendationController::class, 'store'])->name('recommendations.store');


Route::get('/inicio', [ClimaController::class, 'index'])->name('inicio.index');
Route::get('/api/clima', [ClimaController::class, 'apiClima']);




Route::get('/finanzas', [FinanceClienteController::class, 'index'])->name('client.finances.index');
Route::post('/finanzas/income', [FinanceClienteController::class, 'storeIncome'])->name('client.income.store');
Route::post('/finanzas/expense', [FinanceClienteController::class, 'storeExpense'])->name('client.expense.store');
// editar
Route::put('/client/finances/{id}', [FinanceClienteController::class, 'update'])
    ->name('client.finances.update');

// eliminar
Route::delete('/client/finances/{id}', [FinanceClienteController::class, 'destroy'])
    ->name('client.finances.destroy');


Route::get('/Agronomia', [AgronomyController::class, 'index'])->name('Agronomy.index');
