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
use App\Http\Controllers\AgricultureController;

//PRECIOS API-RUTAS
Route::prefix('agro')->group(function () {
    Route::get('products', [AgricultureController::class, 'products']);
    Route::get('data', [AgricultureController::class, 'data']);
    Route::get('summary', [AgricultureController::class, 'summary']);
    Route::get('ranking', [AgricultureController::class, 'ranking']);
});

Route::get('user_apps', [UserAppController::class, 'index'])->name('user_apps');
Route::get('user_apps/{user_app}', [UserAppController::class, 'show'])->name('user_app.show');

Route::get('/recommendations', [RecommendationController::class, 'index'])->name('recommendations.index');
Route::post('/recommendations', [RecommendationController::class, 'store'])->name('recommendations.store');

Route::get('hens', [HenController::class, 'index'])->name('hens');
Route::get('hens/{hen}', [HenController::class, 'show'])->name('hen.show');

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

Route::get('/inicio', [ClimaController::class, 'index'])->name('inicio.index');
Route::get('/api/clima', [ClimaController::class, 'apiClima']);

Route::get('/Agronomia', [AgronomyController::class, 'index'])->name('Agronomy.index');

// ========================================================================
// 🔥 RUTAS DE FINANZAS - CORREGIDAS
// ========================================================================
Route::middleware(['custom.auth'])->prefix('client')->name('client.')->group(function () {

    // ================= HISTORIAL =================
    Route::get('/finances', [FinanceClienteController::class, 'index'])
        ->name('finances.index');

    // ================= INGRESOS =================
    // ✅ CORREGIDO: Ahora usa el método del controlador
    Route::get('/income/create', [FinanceClienteController::class, 'createIncome'])
        ->name('income.create');
    Route::post('/income', [FinanceClienteController::class, 'storeIncome'])
        ->name('income.store');

    // ================= GASTOS =================
    // ✅ CORREGIDO: Ahora usa el método del controlador
    Route::get('/expense/create', [FinanceClienteController::class, 'createExpense'])
        ->name('expense.create');
    Route::post('/expense', [FinanceClienteController::class, 'storeExpense'])
        ->name('expense.store');

    // ================= INVERSIONES =================
    // ✅ CORREGIDO: Ahora usa el método del controlador
    Route::get('/investment/create', [FinanceClienteController::class, 'createInvestment'])
        ->name('investment.create');
    Route::post('/investment', [FinanceClienteController::class, 'storeInvestment'])
        ->name('investment.store');

    // ================= DEUDAS =================
    // ✅ CORREGIDO: Ahora usa el método del controlador
    Route::get('/debt/create', [FinanceClienteController::class, 'createDebt'])
        ->name('debt.create');
    Route::post('/debt', [FinanceClienteController::class, 'storeDebt'])
        ->name('debt.store');
    Route::patch('/debt/{id}/pay', [FinanceClienteController::class, 'payDebtInstallment'])
        ->name('debt.pay');

    // ================= INVENTARIO =================
    // ✅ CORREGIDO: Ahora usa el método del controlador
    Route::get('/inventory/create', [FinanceClienteController::class, 'createInventory'])
        ->name('inventory.create');
    Route::post('/inventory', [FinanceClienteController::class, 'storeInventory'])
        ->name('inventory.store');

    // ================= COSTOS =================
    // ✅ CORREGIDO: Ahora usa el método del controlador
    Route::get('/costs/create', [FinanceClienteController::class, 'createCosts'])
        ->name('costs.create');
    Route::post('/costs', [FinanceClienteController::class, 'storeCosts'])
        ->name('costs.store');

    // ================= EDITAR / ELIMINAR =================
    Route::put('/finances/{id}', [FinanceClienteController::class, 'update'])
        ->name('finances.update');

    Route::delete('/finances/{id}', [FinanceClienteController::class, 'destroy'])
        ->name('finances.destroy');

    // ================= LEGACY =================
    Route::post('/finances', [FinanceClienteController::class, 'store'])
        ->name('finances.store');
});