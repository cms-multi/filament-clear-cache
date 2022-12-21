<?php

use function Pest\Laravel\actingAs;
use function Pest\Livewire\livewire;
use CmsMulti\FilamentClearCache\Http\Livewire\ClearCache;

it('throws exception clearing cache without auth', function () {
    livewire(ClearCache::class)
        ->call('clear');
})->throws(Exception::class);

it('can clear cache with auth', function () {
    actingAs($this->adminUser);

    livewire(ClearCache::class)
        ->call('clear')
        ->assertNotified();
});
