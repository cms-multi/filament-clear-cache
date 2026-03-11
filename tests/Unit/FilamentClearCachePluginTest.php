<?php

use CmsMulti\FilamentClearCache\FilamentClearCachePlugin;
use Filament\Panel;
use Mockery;

it('does not register panel hooks when disabled', function () {
    $panel = Mockery::mock(Panel::class);
    $panel->shouldNotReceive('renderHook');

    FilamentClearCachePlugin::make()
        ->disabled()
        ->register($panel);

    expect(true)->toBeTrue();
});

it('no-ops during boot when disabled', function () {
    $panel = Mockery::mock(Panel::class);

    expect(fn () => FilamentClearCachePlugin::make()
        ->enabled(false)
        ->boot($panel))
        ->not->toThrow(Throwable::class);
});

