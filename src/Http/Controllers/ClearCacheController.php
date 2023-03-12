<?php

namespace CmsMulti\FilamentClearCache\Http\Controllers;

use Filament\Notifications\Notification;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Artisan;

class ClearCacheController extends BaseController
{
    public function clear(): \Illuminate\Http\RedirectResponse
    {
        Artisan::call('filament-clear-cache');

        $notification = Notification::make()
            ->title(__('filament-clear-cache::general.cache_clear_success'))
            ->success()
            ->send();

        if (! $redirect_url = request('redirect')) {
            $domain = config('filament.domain') ?: config('app.url');
            $redirect_url = $domain.'/'.config('filament.path');
        }

        // Redirect to ensure Livewires cache is updated
        return redirect($redirect_url)->with(['filament.notifications' => $notification->toArray()]);
    }
}
