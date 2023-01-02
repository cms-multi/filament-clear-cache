<?php

namespace CmsMulti\FilamentClearCache\Facades;

use CmsMulti\FilamentClearCache\FilamentClearCacheManager;
use Illuminate\Support\Facades\Facade;

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
