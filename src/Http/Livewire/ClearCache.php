<?php

namespace CmsMulti\FilamentClearCache\Http\Livewire;

use Filament\Facades\Filament;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class ClearCache extends Component
{
    public int $cacheChangesCount = 0;

    protected $listeners = ['clearCacheIncrement' => 'incrementChangesCount'];

    public function mount(): void
    {
        throw_if(
            ! Filament::auth()->check(),
            AuthenticationException::class
        );

        if ($changes_count = config('filament-clear-cache.changes_count')) {
            $this->cacheChangesCount = (int) Cache::get($changes_count, 0);
        }
    }

    public function clear(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    {
        $this->cacheChangesCount = 0;

        // Refresh page to ensure new cache
        return redirect(route('filament.clear-cache'), ['redirect' => request()->header('Referer')]);
    }

    public function incrementChangesCount()
    {
        if (! $changes_count = config('filament-clear-cache.changes_count')) {
            return;
        }

        $this->cacheChangesCount++;

        Cache::put($changes_count, $this->cacheChangesCount);
    }

    public function render(): View
    {
        return view('filament-clear-cache::livewire.clear-cache-button');
    }
}
