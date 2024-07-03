<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Authentication;
use App\Models\Setting;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller {
    /**
     * Display the login view.
     */
    public function create(): View {
        $settings = Setting::select('basic')->first();

        return view('backend.auth.login', compact('settings'));
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request) {
        $user = User::with('authentications')->where('email', $request->email)->first();
        $loginCount = null;

        // if user doesn't exists
        if (!$user) {
            $alert = [
                'message' => "User doesn't exists",
                'alert-type' => 'error',
            ];

            return back()->with($alert);
        } else {
            $loginCount = $user->authentications()->count();
            if ($loginCount < 3) {
                $request->authenticate();
                $request->session()->regenerate();

                if ($user->purchased('course')->count() > 0 && !$user->hasAnyRole(['admin', 'super admin'])) {
                    $store = new Authentication();
                    $store->user_id = auth()->id();
                    $store->login_status = 1;
                    $store->login_time = Carbon::now();
                    $store->save();
                }
                if ($user->hasPermissionTo('visit admin panel')) {
                    return redirect()->intended(RouteServiceProvider::ADMIN);
                } else {
                    return redirect()->intended(RouteServiceProvider::HOME);
                }
            } else {
                $alert = [
                    'message' => "Can't log in into more then 3 devices at once",
                    'alert-type' => 'error',
                ];

                return back()->with($alert);
            }
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request) {
        $data = Authentication::where('user_id', $request->user()->id)->first();
        if (null != $data) {
            $data->delete();
        }
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
