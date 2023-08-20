<?php

use CmsMulti\FilamentClearCache\Http\Livewire\ClearCache;

use function Pest\Livewire\livewire;

it('throws exception clearing cache without auth', function () {
    livewire(ClearCache::class)
        ->call('clear');
})->throws(Exception::class);

it('can clear cache with auth', function () {
    $this->actingAs($this->adminUser);

    livewire(ClearCache::class)
        ->call('clear')
        ->assertNotified();
});
