<?php

namespace CmsMulti\FilamentClearCache\Tests;

use CmsMulti\FilamentClearCache\FilamentClearCacheServiceProvider;
use Filament\FilamentServiceProvider;
use Filament\Notifications\NotificationsServiceProvider;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        $packageProviders = [
            LivewireServiceProvider::class,
            FilamentServiceProvider::class,
            FilamentClearCacheServiceProvider::class,
        ];

        if (class_exists(NotificationsServiceProvider::class)) {
            $packageProviders[] = NotificationsServiceProvider::class;
        }

        return $packageProviders;
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_filament-clear-cache_table.php.stub';
        $migration->up();
        */
    }
}
