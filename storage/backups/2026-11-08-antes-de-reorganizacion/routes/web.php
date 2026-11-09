<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\NavigationController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::controller(AuthController::class)->group(function (): void {
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login')->middleware('throttle:10,1')->name('login.store');
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/register', 'register')->middleware('throttle:10,1')->name('register.store');
    Route::post('/password/recovery', 'recoverPassword')
        ->middleware('throttle:5,1')
        ->name('password.recovery');
    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware('demo.auth')->group(function (): void {
    Route::get('/inicio', [HomeController::class, 'index'])->name('home');

    Route::controller(NavigationController::class)->prefix('navegacion')->name('navigation.')->group(function (): void {
        Route::get('/favoritos', 'favorites')->name('favorites');
        Route::get('/notificaciones', 'notifications')->name('notifications');
        Route::get('/perfil', 'profile')->name('profile');
    });

    Route::controller(ModuleController::class)->prefix('modulos')->name('modules.')->group(function (): void {
        Route::get('/finanzas', 'showFinanzas')->name('finanzas');
        Route::get('/tramites', 'showTramites')->name('tramites');
        Route::get('/movilidad', 'showMovilidad')->name('movilidad');
        Route::get('/vivienda', 'showVivienda')->name('vivienda');
    });
});
