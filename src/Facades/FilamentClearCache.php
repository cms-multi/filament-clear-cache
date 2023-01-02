<?php

namespace CmsMulti\FilamentClearCache\Facades;

use Illuminate\Support\Facades\Facade;
use CmsMulti\FilamentClearCache\FilamentClearCacheManager;

/**
 * @method static \CmsMulti\FilamentClearCache\FilamentClearCacheManager addCommand(string | \Closure $command)
 * @method static array getCommands()
 */
class FilamentClearCache extends Facade
{
    protected static function getFacadeAccessor()
    {
        return FilamentClearCacheManager::class;
    }
}
