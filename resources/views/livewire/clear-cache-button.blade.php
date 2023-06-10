<button
    x-data="{{ json_encode(['visible' => $visible]) }}"
	x-show="visible"
    wire:click="clear"
    wire:loading.attr="disabled"
    type="button"
    color="secondary"
    @class([
        'flex flex-shrink-0 w-10 h-10 rounded-full bg-gray-200 items-center justify-center relative',
        'dark:bg-gray-900' => config('filament.dark_mode'),
    ])
    x-tooltip.raw="{{ __('filament-clear-cache::general.clear_cache') }}"
    style="margin-inline-start: 1rem;border-radius:100%;border:none"
>
    <x-heroicon-s-trash wire:loading.remove.delay class="w-5 h-5"/>

    <x-filament-support::loading-indicator x-cloak wire:loading.delay wire:target="clear" class="filament-button-icon w-5 h-5"/>

    @if($cacheChangesCount)
        <span x-cloak
            @class([
                "flex items-center justify-center rounded-full bg-danger-500 text-white text-center overflow-hidden absolute text-xs font-bold",
                "w-5 h-5" => $cacheChangesCount <= 99,
                "w-6 h-6" => $cacheChangesCount > 99,
            ])
            style="top:-0.4rem;right:-0.4rem;line-height:1;letter-spacing:-1px;font-size:10px;font-weight:600;word-spacing:-1px;"
        >
            @if($cacheChangesCount > 99)
                <span>99<span style="vertical-align:text-top;">+</span></span>
            @else
                {{ $cacheChangesCount }}
            @endif
        </span>
    @endif
</button>
