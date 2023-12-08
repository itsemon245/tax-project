<?php

namespace App\Providers;

use App\Models\Course;
use App\Models\Setting;
use App\Models\ServiceCategory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;

class SingletonQueryProvider extends ServiceProvider
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
        $this->app->singleton('setting', fn (Application $app) => Setting::first());
        if (!str(url()->current())->contains('admin')) {
            $this->app->singleton('categories', fn (Application $app) => ServiceCategory::with(['serviceSubCategories', 'serviceSubCategories.services'])->get());
            $this->app->singleton('courses', fn (Application $app) => Course::get(['id', 'name']));
        }
    }
}
