<?php

namespace CmsMulti\FilamentClearCache\Http\Livewire;

use CmsMulti\FilamentClearCache\Jobs\ClearCacheJob;
use Filament\Facades\Filament;
use Filament\Notifications\Notification;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class ClearCache extends Component
{
    public int $cacheChangesCount = 0;

    protected $listeners = ['clearCacheIncrement' => 'incrementChangesCount'];

    public bool $visible;

    public function mount(): void
    {
        throw_if(
            ! Filament::auth()->check(),
            AuthenticationException::class
        );

        if ($changes_count = config('filament-clear-cache.changes_count')) {
            $this->cacheChangesCount = (int) Cache::get($changes_count, 0);
        }

        $this->visible = $this->getVisibility();
    }

    public function getVisibility(): bool
    {
        if (($user = auth()->user()) === null) {
            return false;
        }

        if ($permissions = config('filament-clear-cache.permissions')) {
            return $user->can($permissions);
        }

        if (method_exists($user, 'hasRole') && $role = config('filament-clear-cache.role')) {
            return $user->hasRole($role);
        }

        return true;
    }

    public function clear()
    {
        $this->cacheChangesCount = 0;

        Notification::make()
            ->title(__('filament-clear-cache::general.success'))
            ->success()
            ->send();

        ClearCacheJob::dispatchAfterResponse();

        // Refresh page to ensure new cache
        return $this->redirect(request()->header('Referer'));
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
