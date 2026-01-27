<div class="relative">
    <x-filament::icon-button
        icon="heroicon-o-trash"
        color="gray"
        class="flex-shrink-0 w-10 h-10 rounded-full"
        tooltip="Clear Cache"
        wire:click="clear"
        wire:loading.attr="disabled"
        x-data="{ visible: true }"
        x-show="visible"
        wire:key="clear-cache-button"
    >
        <x-slot name="icon">
            <svg wire:loading.remove.delay class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                      d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                      clip-rule="evenodd" />
            </svg>
        </x-slot>

        <svg wire:loading.delay wire:target="clear"
             class="fi-icon fi-loading-indicator fi-size-md filament-button-icon w-5 h-5"
             fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd"
                  d="M12 19C15.866 19 19 15.866 19 12C19 8.13401 15.866 5 12 5C8.13401 5 5 8.13401 5 12C5 15.866 8.13401 19 12 19ZM12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                  fill-rule="evenodd" fill="currentColor" opacity="0.2"/>
            <path d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z"
                  fill="currentColor"/>
        </svg>
    </x-filament::icon-button>
    @if($cache_count > 0)
        <span
            wire:loading.remove
            class="absolute -top-1 -right-1 bg-danger-500 text-white text-xs font-bold w-5 h-5 flex items-center justify-center rounded-full shadow">
            {{ $cache_count }}
        </span>
    @endif
</div>
