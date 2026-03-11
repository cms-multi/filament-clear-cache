<?php

namespace CmsMulti\FilamentClearCache;

use CmsMulti\FilamentClearCache\Http\Livewire\ClearCache;
use Composer\InstalledVersions;
use Filament\Contracts\Plugin;
use Filament\Panel;
use Illuminate\Support\Facades\Blade;
use Livewire\Livewire;

class FilamentClearCachePlugin implements Plugin
{
    const PACKAGE = 'filament-clear-cache';

    const ID = 'filament-clear-cache';

    const VERSION = '3.0.0';

    protected bool $enabled = true;

    public static function make(): static
    {
        return app(static::class);
    }

    public function getId(): string
    {
        return static::ID;
    }

    public function enabled(bool $enabled = true): static
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function register(Panel $panel): void
    {
        if (! $this->enabled) {
            return;
        }
        $component = config('filament-clear-cache.livewireComponentClass', ClearCache::class);

        if (self::isLivewireV3()) {
            Livewire::component('filament-clear-cache::clear-cache-button', $component);
        }

        $panel->renderHook(
            name: 'panels::user-menu.before',
            hook: fn (): string => Blade::render(
                '@livewire($component)',
                ['component' => $component]
            ),
        );
    }

    public function boot(Panel $panel): void
    {
        if (! $this->enabled) {
            return;
        }
        if (! self::isLivewireV3()) {
            Livewire::addNamespace(
                namespace: 'filament-clear-cache',
                viewPath: __DIR__ . '/../resources/views/livewire',
            );
        }
    }

    private static function isLivewireV3(): bool
    {
        $version = InstalledVersions::getVersion('livewire/livewire');

        return version_compare($version, '4.0.0', '<');
    }
}
