<?php

namespace Zeropingheroes\Lanyard\Providers;

use Illuminate\Support\ServiceProvider;
use Zeropingheroes\Lanyard\User;
use Zeropingheroes\Lanyard\Observers\UserObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
