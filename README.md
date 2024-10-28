# Filament Clear Cache

[![Latest Version on Packagist](https://img.shields.io/packagist/v/cms-multi/filament-clear-cache.svg?style=flat-square)](https://packagist.org/packages/cms-multi/filament-clear-cache)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/cms-multi/filament-clear-cache/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/cms-multi/filament-clear-cache/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/cms-multi/filament-clear-cache/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/cms-multi/filament-clear-cache/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/cms-multi/filament-clear-cache.svg?style=flat-square)](https://packagist.org/packages/cms-multi/filament-clear-cache)

Add a button to easily clear the cache from your filament admin.

<img width="449" alt="Filament Admin Toolbar Header" src="https://user-images.githubusercontent.com/533658/224348501-81f91bde-181c-454a-aafc-e633c1e7ae6f.png">


#### Compatibility

| Plugin Version | Filament Version | PHP Version |
|----------------|-----------------|-------------|
| [1.x](https://github.com/cms-multi/filament-clear-cache/tree/1.x)            | 2.x   | \> 8.0      |
| [2.x](https://github.com/cms-multi/filament-clear-cache/tree/2.x)            | 3.x             | \> 8.1      |

## Installation

You can install the package via composer:

```bash
composer require cms-multi/filament-clear-cache
```

## Configuration

You can publish the configuration with:

```shell
php artisan vendor:publish --provider="CmsMulti\FilamentClearCache\FilamentClearCacheServiceProvider"
```

### Registering the plugin

```php
use CmsMulti\FilamentClearCache\FilamentClearCachePlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            FilamentClearCachePlugin::make(),
        ])
}
```

## Customizing

Under the hood `optimize:clear` is called after clicking the trash button.

You may register any custom commands from inside the `boot()` method of your Service Provider:

```php
use CmsMulti\FilamentClearCache\Facades\FilamentClearCache;

public function boot()
{
    FilamentClearCache::addCommand('page-cache:clear');
}
```

To increment the button count call Livewire event `clearCacheIncrement`.
```php
// Livewire v2
$this->emit('clearCacheIncrement');

// Livewire v3
$this->dispatch('clearCacheIncrement')->to(\CmsMulti\FilamentClearCache\Http\Livewire\ClearCache::class);
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [howdu](https://github.com/cms-multi)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
