# Filament Clear Cache 

[![Latest Version on Packagist](https://img.shields.io/packagist/v/cms-multi/filament-clear-cache.svg?style=flat-square)](https://packagist.org/packages/cms-multi/filament-clear-cache)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/cms-multi/filament-clear-cache/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/cms-multi/filament-clear-cache/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/cms-multi/filament-clear-cache/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/cms-multi/filament-clear-cache/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/cms-multi/filament-clear-cache.svg?style=flat-square)](https://packagist.org/packages/cms-multi/filament-clear-cache)

Add a button to easily clear the cache from your filament admin.

<img width="431" alt="Filament Admin Toolbar Header" src="https://user-images.githubusercontent.com/533658/209122318-a551e946-27c1-437f-b681-1e62b2f65b6d.png">

## Installation

You can install the package via composer:

```bash
composer require cms-multi/filament-clear-cache
```

## Customizing

Under the hood `optimize:clear` is called after clicking the button.

You may register any custom commands from inside the `boot()` method of your Service Provider: 

```php
use CmsMulti\FilamentClearCache\Facades\FilamentClearCache;

public function boot()
{
    FilamentClearCache::addCommand('page-cache:clear');
}
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
