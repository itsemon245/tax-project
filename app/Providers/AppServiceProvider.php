<?php

namespace App\Providers;

use App\Models\FiscalYear;
use App\Models\CustomService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     */
    public function register(): void {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {
        // dd($this->app);

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
            'Expense' => 'App\Models\Expense',
            CustomService::class => CustomService::class,
        ]);
        Paginator::useBootstrapFive();

        if (isDatabaseOk()) {
            FiscalYear::updateOrCreate(['year' => currentFiscalYear()], ['year' => currentFiscalYear()]);
        }
    }
}
