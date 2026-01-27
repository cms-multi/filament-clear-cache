<?php

use CmsMulti\FilamentClearCache\Facades\FilamentClearCache;

it('facade adds commands and exposes them', function () {
    FilamentClearCache::addCommand('view:clear');
    FilamentClearCache::addCommand('config:cache', ['--force' => true]);

    $commands = FilamentClearCache::getCommands();

    expect($commands)
        ->toHaveCount(2)
        ->toContain('view:clear');
    expect($commands[1])
        ->toBe(['config:cache', ['--force' => true]]);
});
