<?php

namespace App\Providers;

use App\Models\Course;
use App\Enums\PageName;
use App\Models\BookCategory;
use App\Models\Setting;
use App\Models\CustomService;
use App\Models\ServiceCategory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;

class SingletonQueryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->singleton('setting', fn (Application $app) => Setting::first());
        $this->app->singleton('categories', fn (Application $app) => ServiceCategory::with(['serviceSubCategories', 'serviceSubCategories.services'])->get());
        $this->app->singleton('bookCategories', fn (Application $app) => BookCategory::get());
        $this->app->singleton('courses', fn (Application $app) => Course::get(['id', 'name']));
        $this->app->singleton('customServices', fn (Application $app) => CustomService::with('image')->where('page_name', PageName::Home->value)->get());
        $this->app->singleton('customServicesAccount', fn (Application $app) => CustomService::with('image')->where('page_name', PageName::Account->value)->get());

        if (app('setting')->basic?->app_name ?? false) {
            config([
                'app.name' => app('setting')->basic?->app_name,
                'mail.from.name'=> app('setting')->basic?->app_name,
            ]);
        }
    }
}
