<?php

use CmsMulti\FilamentClearCache\FilamentClearCacheManager;

it('adds string command', function () {
    $manager = new FilamentClearCacheManager;
    $manager->addCommand('cache:clear');

    expect($manager->getCommands())
        ->toHaveCount(1)
        ->toContain('cache:clear');
});

it('adds array command with params', function () {
    $manager = new FilamentClearCacheManager;
    $manager->addCommand('config:cache', ['--force' => true]);

    expect($manager->getCommands()[0])
        ->toBe(['config:cache', ['--force' => true]]);
});

it('adds closure command', function () {
    $manager = new FilamentClearCacheManager;
    $ran = false;
    $manager->addCommand(function () use (&$ran) {
        $ran = true;
    });

    $commands = $manager->getCommands();
    expect($commands)->toHaveCount(1);
    // Invoke the closure to ensure it's callable
    $closure = $commands[0];
    expect(is_callable($closure))->toBeTrue();
    $closure();
    expect($ran)->toBeTrue();
});
