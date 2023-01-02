<?php

namespace CmsMulti\FilamentClearCache\Commands;

use CmsMulti\FilamentClearCache\Facades\FilamentClearCache;
use Illuminate\Console\Command;

class FilamentClearCacheCommand extends Command
{
    public $signature = 'filament-clear-cache';

    public $description = 'Clear cache command';

    public function handle(): int
    {
        $this->call('optimize:clear');

        $commands = FilamentClearCache::getCommands();

        foreach ($commands as $command) {
            if (is_string($command)) {
                $this->call($command);
            } else {
                call_user_func($command);
            }
        }

        $this->comment(__('filament-clear-cache::general.success'));

        return self::SUCCESS;
    }
}
