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
    public function configurePackage(Package $package): void
    {
        $package
            ->name(FilamentClearCachePlugin::ID)
            ->hasCommand(FilamentClearCacheCommand::class)
            ->hasConfigFile('filament-clear-cache')
            ->hasTranslations()
            ->hasViews();
    }

    public function packageRegistered(): void
    {
        $this->app->scoped(FilamentClearCacheManager::class);

        parent::packageRegistered();
    }
}
