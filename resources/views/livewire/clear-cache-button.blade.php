<button
    x-data="{{ json_encode(['visible' => $visible]) }}"
    x-show="visible"
    wire:click="clear"
    wire:loading.attr="disabled"
    wire:key="clear-cache-button"
    type="button"
    class="flex flex-shrink-0 w-10 h-10 rounded-full bg-gray-200 items-center justify-center relative dark:bg-gray-900"
    x-tooltip.raw="{{ __('filament-clear-cache::general.clear_cache') }}"
>
    @svg('heroicon-s-trash', 'w-5 h-5', ['wire:loading.remove.delay'])

    <x-filament::loading-indicator x-cloak wire:loading.delay wire:target="clear" class="filament-button-icon w-5 h-5"/>

    @if ($cache_count)
        <span x-cloak
              @class([
                  "flex items-center justify-center rounded-full bg-primary-500 text-white text-center overflow-hidden absolute text-xs font-bold",
                  "w-5 h-5" => $cache_count <= 99,
                  "w-6 h-6" => $cache_count > 99,
              ])
              style="top:-0.4rem;right:-0.4rem;line-height:1;letter-spacing:-1px;font-size:10px;font-weight:600;word-spacing:-1px;"
        >
            @if($cache_count > 99)
                <span>99<span style="vertical-align:text-top;">+</span></span>
            @else
                {{ $cache_count }}
            @endif
        </span>
    @endif
</button>
