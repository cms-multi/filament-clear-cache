<?php

use CmsMulti\FilamentClearCache\Commands\FilamentClearCacheCommand;
use CmsMulti\FilamentClearCache\Facades\FilamentClearCache;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

it('runs default commands from config', function () {
    config()->set('filament-clear-cache.default_commands', [
        'config:clear',
        'cache:clear',
    ]);

    $exitCode = Artisan::call(FilamentClearCacheCommand::class);

    expect($exitCode)->toBe(0);
});

it('runs custom string commands added via facade', function () {
    FilamentClearCache::addCommand('route:clear');

    $exitCode = Artisan::call(FilamentClearCacheCommand::class);

    expect($exitCode)->toBe(0);
});

it('runs custom array command with parameters', function () {
    FilamentClearCache::addCommand('config:cache', ['--no-ansi' => true]);

    $exitCode = Artisan::call(FilamentClearCacheCommand::class);

    expect($exitCode)->toBe(0);
});

it('runs custom closure command', function () {
    $ran = false;
    FilamentClearCache::addCommand(function () use (&$ran) {
        $ran = true;
    });

    $exitCode = Artisan::call(FilamentClearCacheCommand::class);

    expect($exitCode)->toBe(0);
    expect($ran)->toBeTrue();
});

it('resets changes_count cache key when configured', function () {
    $key = 'filament_clear_cache_changes';
    config()->set('filament-clear-cache.changes_count', $key);
    Cache::put($key, 5);

    Artisan::call(FilamentClearCacheCommand::class);

    expect(Cache::get($key))->toBe(0);
});
