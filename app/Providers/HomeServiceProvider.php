<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models;

class HomeServiceProvider extends ServiceProvider
{

    protected $defer = true;

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
        View::share('categories', $categories);
        View::share('isLogged', $isLogged);
    }
}
