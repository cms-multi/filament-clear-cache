<x-filament::button wire:click="clear" type="button" style="margin-inline-start: 1rem;" @class([
        'flex flex-shrink-0 w-10 h-10 rounded-full bg-gray-200 items-center justify-center',
        'dark:bg-gray-900' => config('filament.dark_mode'),
    ]) x-tooltip.raw="{{ __('filament-clear-cache::general.clear_cache') }}">
    <x-heroicon-s-trash class="w-4 h-4"/>
</x-filament::button>