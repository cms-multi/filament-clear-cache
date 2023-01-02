<?php

namespace CmsMulti\FilamentClearCache;

use Closure;
use Illuminate\Support\Traits\Macroable;

class FilamentClearCacheManager
{
    use Macroable;

    protected array $commands = [];

    public function addCommand(string|Closure $command): static
    {
        $this->commands[] = $command;

        return $this;
    }

    public function getCommands(): array
    {
        return $this->commands;
    }
}
