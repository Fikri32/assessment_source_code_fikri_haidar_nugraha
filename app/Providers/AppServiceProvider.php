<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(\Illuminate\Http\Request $request)
    {
        if (app()->environment('local')) {
            // Aplikasi berjalan secara lokal
            URL::forceScheme('http');
        } else {
            // Aplikasi berjalan di lingkungan selain lokal (contohnya, di Ngrok)
            URL::forceScheme('https');
        }
    }
}
