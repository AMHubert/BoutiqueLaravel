<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models;

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
    public function boot()
    {
        //
        $categories = Models\Category::all();
        $isLogged = false;
        $subtitle = 'Index';

        View::share('subtitle', $subtitle);
        View::share('categories', $categories);
        View::share('isLogged', $isLogged);
    }
}
