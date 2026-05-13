<?php

namespace CmsMulti\FilamentClearCache;

use CmsMulti\FilamentClearCache\Concerns\CanDisablePlugin;
use CmsMulti\FilamentClearCache\Http\Livewire\ClearCache;
use Composer\InstalledVersions;
use Filament\Contracts\Plugin;
use Filament\Facades\Filament;
use Filament\Pages\SimplePage;
use Filament\Panel;
use Illuminate\Support\Facades\Blade;
use Livewire\Livewire;

class FilamentClearCachePlugin implements Plugin
{
    use CanDisablePlugin;

    const PACKAGE = 'filament-clear-cache';

    const ID = 'filament-clear-cache';

    const VERSION = '3.0.1';

    protected bool $hiddenOnSimplePages = true;

    public static function make(): static
    {
        return app(static::class);
    }

    public function hiddenOnSimplePages(bool $condition = true): static
    {
        $this->hiddenOnSimplePages = $condition;

        return $this;
    }

    public function isHiddenOnSimplePages(): bool
    {
        return $this->hiddenOnSimplePages;
    }

    public function getId(): string
    {
        return static::ID;
    }

    public function register(Panel $panel): void
    {
        if (! $this->isEnabled()) {
            return;
        }

        $component = config('filament-clear-cache.livewireComponentClass', ClearCache::class);

        if (self::isLivewireV3()) {
            Livewire::component('filament-clear-cache::clear-cache-button', $component);
        }

        $panel->renderHook(
            name: 'panels::user-menu.before',
            hook: fn (): string => $this->shouldRenderClearCacheButton()
                ? Blade::render(
                    '@livewire($component)',
                    ['component' => $component]
                )
                : '',
        );
    }

    public function boot(Panel $panel): void
    {
        if (! $this->isEnabled()) {
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

    private function shouldRenderClearCacheButton(): bool
    {
        if (! Filament::auth()->check()) {
            return false;
        }

        if (! $this->isHiddenOnSimplePages()) {
            return true;
        }

        $routeAction = request()->route()?->getActionName();

        if (! is_string($routeAction) || $routeAction === 'Closure') {
            return true;
        }

        $routeClass = str($routeAction)->before('@')->toString();

        if (! class_exists($routeClass)) {
            return true;
        }

        return ! is_subclass_of($routeClass, SimplePage::class);
    }
}
