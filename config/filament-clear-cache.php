<?php

use CmsMulti\FilamentClearCache\Http\Livewire\ClearCache;

return [
    // Command to run when clearing the cache
    'default_commands' => [
        'cache:clear',
    ],

    // Session name for the indicator count
    'changes_count' => 'filament-clear-cache',

    // Livewire component for clear cache button in header.
    'livewireComponentClass' => ClearCache::class,

    // Permissions check
    'permissions' => false,

    // Role check
    'role' => false,
];
