<?php

namespace CmsMulti\FilamentClearCache\Commands;

use Illuminate\Console\Command;

class FilamentClearCacheCommand extends Command
{
    public $signature = 'filament-clear-cache';

    public $description = 'Clear cache command';

    public function handle(): int
    {
        $this->call('config:clear');
        $this->call('route:clear');
        $this->call('cache:clear');
        $this->call('view:clear');

        $this->comment('All done');

        return self::SUCCESS;
    }
}
