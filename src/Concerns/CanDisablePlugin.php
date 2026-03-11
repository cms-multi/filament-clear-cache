<?php

namespace CmsMulti\FilamentClearCache\Concerns;

use Filament\Contracts\Plugin;

/**
 * @mixin Plugin
 */
trait CanDisablePlugin
{
    public const DEFAULT_ENABLED = true;

    protected bool $enabled = self::DEFAULT_ENABLED;

    public function enabled(bool $enabled = true): static
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function disabled(bool $disabled = true): static
    {
        $this->enabled = ! $disabled;

        return $this;
    }

    public function isEnabled(): bool
    {
        return $this->enabled;
    }
}
