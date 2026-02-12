<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DivisionController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\SectorController;
use App\Http\Controllers\Admin\SectorTypeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('admin.login');
});

Route::prefix('admin')->name('admin.')->group(function () {
    // Guest Admin Routes
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    });

    // Protected Admin Routes
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
        
        // Potential other admin routes
        Route::resource('leads', LeadController::class);
        
        // Settings & Configuration
        Route::resource('divisions', DivisionController::class);
        Route::resource('sectors', SectorController::class);
        Route::resource('sector-types', SectorTypeController::class);
        Route::post('sector-types/{sector_type}/pricing-rules', [SectorTypeController::class, 'storePricingRule'])->name('sector-types.pricing-rules.store');
        Route::post('sector-types/{sector_type}/pricing-coefficients', [SectorTypeController::class, 'storePricingCoefficient'])->name('sector-types.pricing-coefficients.store');
        // ...
    });
});
