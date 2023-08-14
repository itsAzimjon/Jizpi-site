<?php

namespace App\Providers;

use App\Models\Firstnav;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;

use Illuminate\Support\ServiceProvider;

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
        View::composer('layouts.navbar.navbar', function ($view) {
            $view->with('current_locale', App::currentLocale());
            $view->with('all_locales', config('app.all_locales'));
            $firstnavs = Firstnav::all();
            $view->with('firstnavs', $firstnavs);
        });
    }
}
