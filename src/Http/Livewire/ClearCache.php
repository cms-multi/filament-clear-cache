<?php

namespace CmsMulti\FilamentClearCache\Http\Livewire;

use Filament\Facades\Filament;
use Filament\Notifications\Notification;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Artisan;
use Livewire\Component;

class ClearCache extends Component
{
    public function mount(): void
    {
        throw_if(
            ! Filament::auth()->check(),
            AuthenticationException::class
        );
    }

    public function clear(): void
    {
        Artisan::call('filament-clear-cache');

        Notification::make()
            ->title(__('filament-clear-cache::general.success'))
            ->success()
            ->send();
    }

    public function render(): View
    {
        return view('filament-clear-cache::livewire.clear-cache-button');
    }
}
