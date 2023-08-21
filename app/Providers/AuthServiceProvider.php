<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use App\Events\MonthEnded;
use App\Http\Middleware\Authenticate;
use App\Models\Authentication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        /**  force logout all users in the first day of the month
         * and delete all sessions
         */
        if (today()->format('d') === '1') {
            $users = User::each(function ($user) {
                $user->remember_token = null;
                $user->save();
            });
            Auth::logout();
            Authentication::truncate();
            $sessions = glob(storage_path("framework/sessions/*"));
            foreach ($sessions as $file) {
                if (is_file($file)) {
                    unlink($file);
                }
            }
        }
    }
}
