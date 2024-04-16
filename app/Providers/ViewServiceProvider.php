<?php

namespace App\Providers;

use App\Models\Course;
use App\Models\Review;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\Services\SettingInterface;

class ViewServiceProvider extends ServiceProvider
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
        //

        View::composer('components.frontend.testimonial-section', function ($view) {
            $reviews = Review::with('user')
                ->latest()
                ->limit(10)
                ->get();
            $view->with('reviews', $reviews);
        });

        View::composer([
            'frontend.layouts.header',
            'frontend.layouts.sidebar',
        ], function ($view) {
            $categories = app('categories');
            $settings = app('setting');
            $courses = app('courses');
            $customServices = app('customServices');
            $customServicesAccount = app('customServicesAccount');
            $view->with([
                'settings'    => $settings,
                'basic'       => $settings->basic,
                'logo' => $settings->basic->logo,
                'returnLinks' => $settings->return_links,
                'categories'  => $categories,
                'courses'     => $courses,
                'customServices'     => $customServices,
                'customServicesAccount'     => $customServicesAccount,
            ]);
        });


        View::composer([
            'frontend.layouts.footer',
        ], function ($view) {
            $categories = app('categories');
            $settings = app('setting');
            $view->with([
                'settings'   => $settings,
                'basic'      => $settings->basic,
                'categories' => $categories,
            ]);
        });


        View::composer([
            'frontend.layouts.app',
        ], function ($view) {
            $settings = app('setting');
            $view->with([
                'settings'    => $settings,
                'basic'       => $settings->basic,
                'returnLinks' => $settings->return_links,
            ]);
        });
    }
}
