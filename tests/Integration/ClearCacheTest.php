<?php

use CmsMulti\FilamentClearCache\Http\Livewire\ClearCache;
use CmsMulti\FilamentClearCache\Tests\Models\User;

use function Pest\Livewire\livewire;

it('throws exception clearing cache without auth', function () {
    livewire(ClearCache::class)
        ->call('clear');
})->throws(Exception::class);

it('can clear cache with auth', function () {
    $this->actingAs(User::create([
        'name' => 'John',
        'email' => 'test@test.com',
    ]));

    livewire(ClearCache::class)
        ->call('clear')
        ->assertNotified();
});
