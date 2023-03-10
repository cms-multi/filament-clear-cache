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
        $default_commands = config('filment-clear-cache.default_commands', []);

        foreach ($default_commands as $default_command) {
            $this->call($default_command);
        }

        $commands = FilamentClearCache::getCommands();

        foreach ($commands as $command) {
            if (is_string($command)) {
                $this->call($command);
            } elseif (is_array($command)) {
                $this->call($command[0], $command[1]);
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
