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
    protected User $adminUser;

    protected function setUp(): void
    {
        parent::setUp();

        $this->setUpDatabase($this->app);

        $this->adminUser = User::create([
            'name' => 'John',
            'email' => 'test@test.com',
        ]);

        $this->actingAs($this->adminUser);
    }

    protected function getPackageProviders($app)
    {
        $packageProviders = [
            BladeHeroiconsServiceProvider::class,
            BladeIconsServiceProvider::class,
            LivewireServiceProvider::class,
            FilamentServiceProvider::class,
            NotificationsServiceProvider::class,
            SupportServiceProvider::class,
            FilamentClearCacheServiceProvider::class,
            AdminPanelProvider::class,
        ];

        return $packageProviders;
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

        //self::$migration->up();
    }
}
