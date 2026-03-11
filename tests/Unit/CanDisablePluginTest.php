<?php

use CmsMulti\FilamentClearCache\Concerns\CanDisablePlugin;

it('defaults to enabled', function () {
    $subject = new class
    {
        use CanDisablePlugin;
    };

    expect($subject->isEnabled())->toBeTrue();
});

it('transitions state with enabled', function () {
    $subject = new class
    {
        use CanDisablePlugin;
    };

    $subject->enabled(false);
    expect($subject->isEnabled())->toBeFalse();

    $subject->enabled(true);
    expect($subject->isEnabled())->toBeTrue();
});

it('transitions state with disabled', function () {
    $subject = new class
    {
        use CanDisablePlugin;
    };

    $subject->disabled(true);
    expect($subject->isEnabled())->toBeFalse();

    $subject->disabled(false);
    expect($subject->isEnabled())->toBeTrue();
});
