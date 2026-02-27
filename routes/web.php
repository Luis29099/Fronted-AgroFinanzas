<?php

use App\Http\Controllers\AgronomyController;
use App\Http\Controllers\AnimalProductionController;
use App\Http\Controllers\AvocadoCropController;
use App\Http\Controllers\CattleController;
use App\Http\Controllers\CattleInfoController;
use App\Http\Controllers\CoffeCropController;
use App\Http\Controllers\CropController;
use App\Http\Controllers\HenController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RecommendationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClimaController;
use App\Http\Controllers\FinanceClienteController;
use App\Http\Controllers\AgricultureController;
use App\Http\Controllers\AdminController;

// ── PÚBLICAS (sin login) ──────────────────────────────────────
Route::get('/login',    [AuthController::class, 'showAuth'])->name('login');
Route::get('/register', [AuthController::class, 'showAuth'])->name('register');
Route::post('/login',   [AuthController::class, 'login'])->name('login.submit');
Route::post('/register',[AuthController::class, 'register'])->name('register.submit');
Route::post('/logout',  [AuthController::class, 'logout'])->name('logout');
Route::get('/',         [AuthController::class, 'home'])->name('home');

Route::get('/verify',       [AuthController::class, 'showVerify'])->name('verify.show');
Route::post('/verify',      [AuthController::class, 'verifyCode'])->name('verify.submit');
Route::post('/resend-code', [AuthController::class, 'resendCode'])->name('verify.resend');

Route::get('/admin/login',  [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

// ── PROTEGIDAS (requieren login) ──────────────────────────────
Route::middleware(['custom.auth'])->group(function () {

    
    Route::get('/inicio',    [ClimaController::class, 'index'])->name('inicio.index');
    Route::get('/api/clima', [ClimaController::class, 'apiClima']);
    Route::get('/Agronomia', [AgronomyController::class, 'index'])->name('Agronomy.index');

    // Perfil
    Route::get('/editar-perfil',  [AuthController::class, 'showEditProfile'])->name('perfil.editar');
    Route::post('/editar-perfil', [AuthController::class, 'updateProfile'])->name('perfil.actualizar');

    // Eliminar cuenta
    Route::post('/cuenta/enviar-codigo-eliminacion', [AuthController::class, 'sendDeleteCode'])->name('cuenta.send-delete-code');
    Route::delete('/cuenta/eliminar',                [AuthController::class, 'deleteAccount'])->name('cuenta.eliminar');

    // Notificaciones
    Route::get('/notificaciones',              [NotificationController::class, 'index'])->name('notificaciones.index');
    Route::get('/notificaciones/no-leidas',    [NotificationController::class, 'unreadCount'])->name('notificaciones.unread');
    Route::post('/notificaciones/leer-todas',  [NotificationController::class, 'markAllRead'])->name('notificaciones.read-all');
    Route::post('/notificaciones/{id}/leer',   [NotificationController::class, 'markRead'])->name('notificaciones.read');

    // Recomendaciones
    Route::get('/recommendations',  [RecommendationController::class, 'index'])->name('recommendations.index');
    Route::post('/recommendations', [RecommendationController::class, 'store'])->name('recommendations.store');

    // Informativas (solo accesibles estando logueado)
    Route::get('users',        [UserController::class, 'index'])->name('users');
    Route::get('users/{user}', [UserController::class, 'show'])->name('user.show');

    Route::get('hens',       [HenController::class, 'index'])->name('hens');
    Route::get('hens/{hen}', [HenController::class, 'show'])->name('hen.show');

    Route::get('crops',        [CropController::class, 'index'])->name('crops');
    Route::get('crops/{crop}', [CropController::class, 'show'])->name('crop.show');

    Route::get('coffe_crops',             [CoffeCropController::class, 'index'])->name('coffecrops');
    Route::get('coffe_crops/{coffecrop}', [CoffeCropController::class, 'show'])->name('coffecrop.show');

    Route::get('avocadocrops',               [AvocadoCropController::class, 'index'])->name('avocadocrops');
    Route::get('avocadocrops/{avocadocrop}', [AvocadoCropController::class, 'show'])->name('avocadocrop.show');

    Route::get('animalproductions',                    [AnimalProductionController::class, 'index'])->name('animalproductions');
    Route::get('animalproductions/{animalproduction}', [AnimalProductionController::class, 'show'])->name('animalproduction.show');

    Route::get('cattles',      [CattleInfoController::class, 'index'])->name('cattles');
    Route::get('cattles/{id}', [CattleInfoController::class, 'show'])->name('cattle.show');

    // Agro
    Route::prefix('agro')->group(function () {
        Route::get('products', [AgricultureController::class, 'products']);
        Route::get('data',     [AgricultureController::class, 'data']);
        Route::get('summary',  [AgricultureController::class, 'summary']);
        Route::get('ranking',  [AgricultureController::class, 'ranking']);
    });

    // Hato
    Route::prefix('client/hato')->name('client.cattle.')->group(function () {
        Route::get('/hato',             [CattleController::class, 'index'])->name('index');
        Route::get('/nuevo',            [CattleController::class, 'create'])->name('create');
        Route::post('/',                [CattleController::class, 'store'])->name('store');
        Route::get('/{id}',             [CattleController::class, 'show'])->name('show');
        Route::post('/{id}',            [CattleController::class, 'update'])->name('update');
        Route::delete('/{id}',          [CattleController::class, 'destroy'])->name('destroy');
        Route::get('/{id}/nacimiento',  [CattleController::class, 'showBirthForm'])->name('birth.form');
        Route::post('/{id}/nacimiento', [CattleController::class, 'registerBirth'])->name('birth.store');
    });

    // Finanzas
    Route::prefix('client')->name('client.')->group(function () {
        Route::get('/finances',          [FinanceClienteController::class, 'index'])->name('finances.index');
        Route::get('/income/create',     [FinanceClienteController::class, 'createIncome'])->name('income.create');
        Route::post('/income',           [FinanceClienteController::class, 'storeIncome'])->name('income.store');
        Route::get('/expense/create',    [FinanceClienteController::class, 'createExpense'])->name('expense.create');
        Route::post('/expense',          [FinanceClienteController::class, 'storeExpense'])->name('expense.store');
        Route::get('/investment/create', [FinanceClienteController::class, 'createInvestment'])->name('investment.create');
        Route::post('/investment',       [FinanceClienteController::class, 'storeInvestment'])->name('investment.store');
        Route::get('/debt/create',       [FinanceClienteController::class, 'createDebt'])->name('debt.create');
        Route::post('/debt',             [FinanceClienteController::class, 'storeDebt'])->name('debt.store');
        Route::patch('/debt/{id}/pay',   [FinanceClienteController::class, 'payDebtInstallment'])->name('debt.pay');
        Route::get('/inventory/create',  [FinanceClienteController::class, 'createInventory'])->name('inventory.create');
        Route::post('/inventory',        [FinanceClienteController::class, 'storeInventory'])->name('inventory.store');
        Route::get('/costs/create',      [FinanceClienteController::class, 'createCosts'])->name('costs.create');
        Route::post('/costs',            [FinanceClienteController::class, 'storeCosts'])->name('costs.store');
        Route::put('/finances/{id}',     [FinanceClienteController::class, 'update'])->name('finances.update');
        Route::delete('/finances/{id}',  [FinanceClienteController::class, 'destroy'])->name('finances.destroy');
        Route::post('/finances',         [FinanceClienteController::class, 'store'])->name('finances.store');
    });
});

// ── ADMIN ─────────────────────────────────────────────────────
Route::middleware(['admin.auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/usuarios',               [AdminController::class, 'users'])->name('users');
    Route::get('/usuarios/{id}',          [AdminController::class, 'showUser'])->name('users.show');
    Route::patch('/usuarios/{id}/toggle', [AdminController::class, 'toggleUser'])->name('users.toggle');
    Route::delete('/usuarios/{id}',       [AdminController::class, 'destroyUser'])->name('users.destroy');
    Route::get('/finanzas',               [AdminController::class, 'finances'])->name('finances');
    Route::get('/comentarios',            [AdminController::class, 'comments'])->name('comments');
    Route::delete('/comentarios/{id}',    [AdminController::class, 'destroyComment'])->name('comments.destroy');
});