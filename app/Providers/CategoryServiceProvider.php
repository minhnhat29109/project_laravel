<?php

namespace App\Providers;

use App\Http\Views\MenuCategoryComposer;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('backend.includes.sidebar', MenuCategoryComposer::class);
        view()->composer('frontend.includes.navbar', MenuCategoryComposer::class);

    }
}
