<?php

namespace App\Providers;

use App\Models\PromoCode;
use App\Models\User;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use App\Notifications\PromoCodeNotification;
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
