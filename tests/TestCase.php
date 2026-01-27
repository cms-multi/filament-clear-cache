<?php

namespace CmsMulti\FilamentClearCache\Tests;

use BladeUI\Heroicons\BladeHeroiconsServiceProvider;
use BladeUI\Icons\BladeIconsServiceProvider;
use CmsMulti\FilamentClearCache\FilamentClearCacheServiceProvider;
use CmsMulti\FilamentClearCache\Tests\Models\User;
use CmsMulti\FilamentClearCache\Tests\Provider\AdminPanelProvider;
use Filament\FilamentServiceProvider;
use Filament\Notifications\NotificationsServiceProvider;
use Filament\Support\SupportServiceProvider;
use Illuminate\Database\Schema\Blueprint;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->setUpDatabase($this->app);
    }

    protected function getPackageProviders($app)
    {
        return [
            BladeHeroiconsServiceProvider::class,
            BladeIconsServiceProvider::class,
            FilamentServiceProvider::class,
            NotificationsServiceProvider::class,
            SupportServiceProvider::class,
            FilamentClearCacheServiceProvider::class,
            LivewireServiceProvider::class,
            AdminPanelProvider::class,
        ];
    }

    /**
     * Set up the database.
     *
     * @param  \Illuminate\Foundation\Application  $app
     */
    protected function setUpDatabase($app)
    {
        $app['config']->set('auth.providers.users.model', User::class);

        $app['db']->connection()->getSchemaBuilder()->create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('name');
        });

        // Cache array
        $app['cache']->set('cache.default', 'array');

        // self::$migration->up();
    }
}
