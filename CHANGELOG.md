# Changelog

All notable changes to `filament-clear-cache` will be documented in this file.

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
