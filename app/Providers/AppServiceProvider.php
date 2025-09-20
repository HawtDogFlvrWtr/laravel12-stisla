<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Dashboard;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

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

        // Bind the 'categories' variable to the 'layouts.app' view
        View::composer('layouts.app', function ($view) {
            $dashboards = Dashboard::where('user_id', '=', Auth::id())
                ->orderBy('id', 'desc')
                ->get();
            $view->with('dashboards', $dashboards);
        });
    }
}
