<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HousingController;
use App\Http\Controllers\MobilityController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\ProcedureController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/inicio');

Route::controller(AuthController::class)->group(function (): void {
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login')->middleware('throttle:10,1')->name('login.store');
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/register', 'register')->middleware('throttle:10,1')->name('register.store');
    Route::post('/password/recovery', 'recoverPassword')->middleware('throttle:5,1')->name('password.recovery');
    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware('demo.auth')->group(function (): void {
    Route::get('/inicio', [HomeController::class, 'index'])->name('home');

    Route::controller(NavigationController::class)->prefix('navegacion')->name('navigation.')->group(function (): void {
        Route::get('/favoritos', 'favorites')->name('favorites');
        Route::get('/notificaciones', 'notifications')->name('notifications');
        Route::get('/perfil', 'profile')->name('profile');
    });

    Route::controller(FinanceController::class)->prefix('finanzas')->name('finance.')->group(function (): void {
        Route::get('/', 'index')->name('index');
        Route::get('/guias/{guide}', 'guide')->name('guides.show');
        Route::get('/aprende/{experience}', 'experience')->name('experiences.show');
    });

    Route::controller(ProcedureController::class)->prefix('tramites')->name('procedures.')->group(function (): void {
        Route::get('/', 'index')->name('index');
        Route::get('/oficinas', 'offices')->name('offices');
        Route::get('/guias/{guide}', 'guide')->name('guides.show');
    });

    Route::controller(MobilityController::class)->prefix('movilidad')->name('mobility.')->group(function (): void {
        Route::get('/', 'index')->name('index');
        Route::get('/rutas', 'routes')->name('routes');
        Route::get('/planificador', 'planner')->name('planner');
        Route::get('/trafico', 'traffic')->name('traffic');
        Route::get('/guias/{guide}', 'guide')->name('guides.show');
    });

    Route::controller(HousingController::class)->prefix('vivienda')->name('housing.')->group(function (): void {
        Route::get('/', 'index')->name('index');
        Route::get('/guias/{guide}', 'guide')->name('guides.show');
        Route::get('/experiencias/{experience}', 'experience')->name('experiences.show');
    });

    Route::permanentRedirect('/modulos/finanzas', '/finanzas');
    Route::permanentRedirect('/modulos/tramites', '/tramites');
    Route::permanentRedirect('/modulos/movilidad', '/movilidad');
    Route::permanentRedirect('/modulos/vivienda', '/vivienda');
});
