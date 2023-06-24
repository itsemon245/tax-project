<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Authentication;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('backend.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $user = User::with('authentications')->where('email', $request->email)->get();
        
        $count_user = count($user[0]->authentications);
        if($count_user > 2){
            $notification = array(
                'message' => "Already logged in at 3 places! Logout anyone and try again.",
                'alert-type' => 'danger',
            );
            return back()->with($notification);
        }else{
            $store = new Authentication();
            $store->user_id = $user[0]->id;
            $store->login_status = 1;
            $store->login_time = Carbon::now();
            $store->save();
            $request->authenticate();
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::HOME);
        }

    }



    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $data = Authentication::where('user_id', $request->auth_id)->first();
        if($data != null){
            $data->delete();
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }

    }
}
