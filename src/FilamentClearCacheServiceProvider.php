<?php

namespace CmsMulti\FilamentClearCache;

use CmsMulti\FilamentClearCache\Commands\FilamentClearCacheCommand;
use CmsMulti\FilamentClearCache\Http\Livewire\ClearCache;
use Filament\Facades\Filament;
use Illuminate\View\View;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentClearCacheServiceProvider extends PackageServiceProvider
{
    public function boot()
    {
        parent::boot();

        Livewire::component('filament-clear-cache::clear-cache-button', ClearCache::class);

        Filament::serving(function () {
            Filament::registerRenderHook(
                'global-search.end',
                fn (): View => view('filament-clear-cache::widgets.toolbar-menu'),
            );
        });
    }

    public function packageRegistered(): void
    {
        $this->app->scoped(FilamentClearCacheManager::class);

        parent::packageRegistered();
    }

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('filament-clear-cache')
            ->hasViews()
            ->hasTranslations()
            ->hasCommand(FilamentClearCacheCommand::class);
    }
}
