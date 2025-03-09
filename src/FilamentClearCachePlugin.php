<?php

namespace CmsMulti\FilamentClearCache;

use CmsMulti\FilamentClearCache\Http\Livewire\ClearCache;
use Filament\Contracts\Plugin;
use Filament\Panel;
use Illuminate\Support\Facades\Blade;
use Livewire\Livewire;

class FilamentClearCachePlugin implements Plugin
{
    const PACKAGE = 'filament-clear-cache';

    const ID = 'filament-clear-cache';

    const VERSION = '2.0.8';

    public static function make(): static
    {
        return app(static::class);
    }

    public function getId(): string
    {
        return static::ID;
    }

    public function register(Panel $panel): void
    {
        Livewire::component(
            'filament-clear-cache::clear-cache-button',
            config('filament-clear-cache.livewireComponentClass', ClearCache::class)
        );

        $panel->renderHook(
            name: 'panels::user-menu.before',
            hook: fn (): string => Blade::render('@livewire(\'filament-clear-cache::clear-cache-button\')'),
        );
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
