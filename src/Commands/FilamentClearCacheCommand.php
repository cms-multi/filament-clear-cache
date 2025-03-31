<?php

namespace CmsMulti\FilamentClearCache\Commands;

use CmsMulti\FilamentClearCache\Facades\FilamentClearCache;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class FilamentClearCacheCommand extends Command
{
    public $signature = 'filament-clear-cache';

    public $description = 'Clear cache command';

    public function handle(): int
    {
        $defaultCommands = config('filament-clear-cache.default_commands', []);

        foreach ($defaultCommands as $defaultCommand) {
            $this->components->task($defaultCommand, fn () => $this->callSilently($defaultCommand) == 0);
        }

        $commands = FilamentClearCache::getCommands();

        foreach ($commands as $command) {
            if (is_string($command)) {
                $this->components->task($command, fn () => $this->callSilently($command) == 0);
            } elseif (is_array($command)) {
                $this->components->task($command[0], function () use ($command) {
                    $this->callSilently($command[0], $command[1]);

                    return true;
                });
            } else {
                call_user_func($command);
            }
        }

        if ($changes_count = config('filament-clear-cache.changes_count')) {
            Cache::put($changes_count, 0);
        }

        $this->comment(__('filament-clear-cache::general.success'));

        return self::SUCCESS;
    }
}
