<x-filament::button wire:click="clear" type="button" color="secondary" style="margin-inline-start: 1rem;border-radius:100%;border:none" @class([
        'flex flex-shrink-0 w-10 h-10 rounded-full bg-gray-200 items-center justify-center',
        'dark:bg-gray-900' => config('filament.dark_mode'),
    ]) x-tooltip.raw="{{ __('filament-clear-cache::general.clear_cache') }}">
    <x-heroicon-s-trash wire:loading.remove.delay class="w-5 h-5"/>
    <x-filament-support::loading-indicator x-cloak wire:loading.delay wire:target="clear" class="filament-button-icon w-5 h-5"/>
</x-filament::button>