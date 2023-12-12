<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Setting;
use App\Models\PromoCode;
use App\Events\MonthEnded;
use App\Models\CustomService;
use Illuminate\Routing\Route;
use App\Listeners\LogoutAllUsers;
use Illuminate\Auth\Events\Logout;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\ServiceProvider;
use App\Notifications\PromoCodeNotification;
use App\Interfaces\Services\SettingInterface;
use Laravel\Telescope\TelescopeServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use App\Interfaces\Services\BaseServiceInterface;
use App\Services\CustomService\CustomServiceService;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register() : void
    {
        if($this->app->environment('local')){
            $this->app->register(TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot() : void
    {

        // dd($cookie);

        Relation::enforceMorphMap([
            'Product'            => 'App\Models\Product',
            'Service'            => 'App\Models\Service',
            'ExpertProfile'      => 'App\Models\ExpertProfile',
            'Book'               => 'App\Models\Book',
            'Course'             => 'App\Models\Course',
            'CaseStudy'          => 'App\Models\CaseStudy',
            'CaseStudyPackage'   => 'App\Models\CaseStudyPackage',
            'User'               => 'App\Models\User',
            'Industry'           => 'App\Models\Industry',
            'About'              => 'App\Models\About',
            CustomService::class => CustomService::class
        ]);
        Paginator::useBootstrapFive();

    }
}
