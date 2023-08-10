<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

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
        Relation::enforceMorphMap([
            'Product' => 'App\Models\Product',
            'Service' => 'App\Models\Service',
            'ExpertProfile' => 'App\Models\ExpertProfile',
            'Book' => 'App\Models\Book',
            'Course' => 'App\Models\Course',
            'User' => 'App\Models\User',
        ]);
    }
}
