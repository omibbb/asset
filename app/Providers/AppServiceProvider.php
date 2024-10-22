<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Others;
use App\Observers\OthersObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Others::observe(OthersObserver::class);
    }
}
