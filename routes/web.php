<?php

use Illuminate\Support\Facades\Route;

Route::domain(config('filament.domain'))
    ->middleware(config('filament.middleware.base') + config('filament.middleware.auth'))
    ->name('filament.')
    ->group(function () {
        Route::prefix(config('filament.core_path'))->group(function () {
            Route::get('/clear-cache', [\CmsMulti\FilamentClearCache\Http\Controllers\ClearCacheController::class, 'clear'])
                ->name('clear-cache');
        });
    });
