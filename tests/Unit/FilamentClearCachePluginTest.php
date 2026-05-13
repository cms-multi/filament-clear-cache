<?php

use CmsMulti\FilamentClearCache\FilamentClearCachePlugin;
use CmsMulti\FilamentClearCache\Tests\Models\User;
use Filament\Pages\Dashboard;
use Filament\Pages\SimplePage;
use Filament\Panel;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;

class FilamentClearCachePluginTestSimplePage extends SimplePage {}

it('does not register panel hooks when disabled', function () {
    $panel = Mockery::mock(Panel::class);
    $panel->shouldNotReceive('renderHook');

    FilamentClearCachePlugin::make()
        ->disabled()
        ->register($panel);

    expect(true)->toBeTrue();
});

it('does not render the clear cache button when unauthenticated', function () {
    $hook = captureClearCacheRenderHook();

    Blade::shouldReceive('render')->never();

    expect($hook())->toBe('');
});

it('does not render the clear cache button on simple pages', function () {
    $hook = captureClearCacheRenderHook();

    $this->actingAs(createClearCacheUser());
    setClearCacheRouteAction(FilamentClearCachePluginTestSimplePage::class);

    Blade::shouldReceive('render')->never();

    expect($hook())->toBe('');
});

it('can render the clear cache button on simple pages when enabled', function () {
    $hook = captureClearCacheRenderHook(
        FilamentClearCachePlugin::make()->hiddenOnSimplePages(false),
    );

    $this->actingAs(createClearCacheUser());
    setClearCacheRouteAction(FilamentClearCachePluginTestSimplePage::class);

    Blade::shouldReceive('render')
        ->once()
        ->with('@livewire($component)', Mockery::type('array'))
        ->andReturn('clear-cache-button');

    expect($hook())->toBe('clear-cache-button');
});

it('renders the clear cache button on non-simple pages', function () {
    $hook = captureClearCacheRenderHook();

    $this->actingAs(createClearCacheUser());
    setClearCacheRouteAction(Dashboard::class);

    Blade::shouldReceive('render')
        ->once()
        ->with('@livewire($component)', Mockery::type('array'))
        ->andReturn('clear-cache-button');

    expect($hook())->toBe('clear-cache-button');
});

it('no-ops during boot when disabled', function () {
    $panel = Mockery::mock(Panel::class);

    expect(fn () => FilamentClearCachePlugin::make()
        ->enabled(false)
        ->boot($panel))
        ->not->toThrow(Throwable::class);
});

function captureClearCacheRenderHook(?FilamentClearCachePlugin $plugin = null): Closure
{
    $hook = null;
    $panel = Mockery::mock(Panel::class);
    $panel
        ->shouldReceive('renderHook')
        ->once()
        ->with('panels::user-menu.before', Mockery::on(function (Closure $renderHook) use (&$hook): bool {
            $hook = $renderHook;

            return true;
        }))
        ->andReturnSelf();

    ($plugin ?? FilamentClearCachePlugin::make())->register($panel);

    return $hook;
}

function createClearCacheUser(): User
{
    return User::create([
        'name' => 'John',
        'email' => 'test@test.com',
    ]);
}

function setClearCacheRouteAction(string $action): void
{
    $route = Route::get('/clear-cache-test-route', $action);

    request()->setRouteResolver(fn () => $route);
}
