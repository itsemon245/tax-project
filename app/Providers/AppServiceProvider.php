<?php

namespace App\Providers;

use App\Models\User;
use App\Models\PromoCode;
use App\Events\MonthEnded;
use App\Listeners\LogoutAllUsers;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use App\Notifications\PromoCodeNotification;
use Illuminate\Auth\Events\Logout;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Cookie;

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

        // dd($cookie);

        Relation::enforceMorphMap([
            'Product' => 'App\Models\Product',
            'Service' => 'App\Models\Service',
            'ExpertProfile' => 'App\Models\ExpertProfile',
            'Book' => 'App\Models\Book',
            'Course' => 'App\Models\Course',
            'CaseStudy' => 'App\Models\CaseStudy',
            'CaseStudyPackage' => 'App\Models\CaseStudyPackage',
            'User' => 'App\Models\User',
            'Industry' => 'App\Models\Industry',
            'About' => 'App\Models\About',
        ]);
    }
}
