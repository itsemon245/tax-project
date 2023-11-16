<?php

namespace App\Providers;

use App\Models\ServiceCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register() : void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot() : void
    {
        //
        View::composer('frontend.layouts.header', function ($view) {
            $categories = ServiceCategory::with(['serviceSubCategories'])->get();
            $view->with('categories', $categories);
        });
    }
}
