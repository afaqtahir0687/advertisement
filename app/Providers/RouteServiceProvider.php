<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        parent::boot();

        // Frontend routes
        Route::middleware('web')
            ->group(base_path('routes/web.php'));

        // Admin routes
        Route::middleware('web')
            ->group(base_path('routes/admin.php'));
    }
}
