<?php

namespace CmsMulti\FilamentClearCache\Http\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Artisan;
use Filament\Notifications\Notification;
use Livewire\Component;

class ClearCache extends Component
{
    public function clear(): void
    {
        Artisan::call('filament-clear-cache');

        Notification::make()
            ->title('Cache clear successfully')
            ->success()
            ->send();
    }

    public function render(): View
    {
        return view('filament-clear-cache::livewire.clear-cache-button');
    }
}
