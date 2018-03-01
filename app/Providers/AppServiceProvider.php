<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Post\PostInterface;
use App\Repository\Post\PostRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PostInterface::class,PostRepository::class);
    }
}
