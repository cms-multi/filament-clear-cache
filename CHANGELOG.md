# Changelog

All notable changes to `filament-clear-cache` will be documented in this file.

## 2.0.1 - 2023-08-08

### What's Changed

- Remove custom button styles and fix tests by @howdu in https://github.com/cms-multi/filament-clear-cache/pull/15
- Better notification message by @martin-ro in https://github.com/cms-multi/filament-clear-cache/pull/16

### New Contributors

- @martin-ro made their first contribution in https://github.com/cms-multi/filament-clear-cache/pull/16

**Full Changelog**: https://github.com/cms-multi/filament-clear-cache/compare/2.0.0...2.0.1

## 2.0.0 - 2023-08-01

### What's Changed

- Add support for Filament v3 by @howdu in https://github.com/cms-multi/filament-clear-cache/pull/13
- Bump dependabot/fetch-metadata from 1.5.1 to 1.6.0 by @dependabot in https://github.com/cms-multi/filament-clear-cache/pull/11

### New Contributors

- @howdu made their first contribution in https://github.com/cms-multi/filament-clear-cache/pull/13

**Full Changelog**: https://github.com/cms-multi/filament-clear-cache/compare/1.0.9...2.0.0

## 1.0.9 - 2023-06-10

### What's Changed

- Bump aglipanci/laravel-pint-action from 2.1.0 to 2.2.0 by @dependabot in https://github.com/cms-multi/filament-clear-cache/pull/6
- Bump dependabot/fetch-metadata from 1.3.6 to 1.4.0 by @dependabot in https://github.com/cms-multi/filament-clear-cache/pull/7
- Bump aglipanci/laravel-pint-action from 2.2.0 to 2.3.0 by @dependabot in https://github.com/cms-multi/filament-clear-cache/pull/9
- Bump dependabot/fetch-metadata from 1.4.0 to 1.5.1 by @dependabot in https://github.com/cms-multi/filament-clear-cache/pull/8
- Add visible config by @a21ns1g4ts in https://github.com/cms-multi/filament-clear-cache/pull/10

### New Contributors

- @a21ns1g4ts made their first contribution in https://github.com/cms-multi/filament-clear-cache/pull/10

**Full Changelog**: https://github.com/cms-multi/filament-clear-cache/compare/1.0.8...1.0.9

## v1.0.8 - 2023-03-12

**Full Changelog**: https://github.com/cms-multi/filament-clear-cache/compare/1.0.7...1.0.8

## v1.0.7 - 2023-03-12

Bug fix

## v.1.0.6 - 2023-03-10

- Fix fixe issue with Livewire cached resources not updating after calling `optimize`. Perform a full redirect after clearing cache.
- Call the `optimize` command after clearing cache.
- Add `changes_count` to visually display the total number in cache button, max 99+
- Add config with option for controlling session key name

**Full Changelog**: https://github.com/cms-multi/filament-clear-cache/compare/1.0.5...1.0.6

## v1.0.5 - 2023-02-07

Fix adding custom command with params.

## v1.0.1 - 2023-01-02

Register custom commands.
Switch to use optimize:clear

## v1.0.0 - 2022-12-21

First release
