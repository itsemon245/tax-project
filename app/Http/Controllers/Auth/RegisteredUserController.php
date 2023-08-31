<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Referee;
use App\Models\Setting;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create($user_name = null): View
    {
        return view('backend.auth.register', compact('user_name'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->refer_code);
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'user_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = User::create($data);
        $user->refer_link = url("/register/r/" . $request->user_name);
        $user->password = Hash::make($data['password']);
        $arr = explode(' ', $request->name);
        if (count($arr) > 1) {
            $seed = $arr[0][0] . $arr[1][0];
        } else {
            $seed = $request->name;
        }
        $user->image_url = "https://api.dicebear.com/6.x/initials/svg?seed=$seed&backgroundType=gradientLinear&backgroundRotation=0,360";
        $user->save();
        $user->assignRole('user');


        if ($request->has('refer_code')) {
            $parent = User::where('user_name', $request->refer_code)->first();
            $referee = new Referee();
            $referee->user_id = $user->id;
            $referee->parent_id = $parent->id;
            $referee->commission = Setting::first(['reference'])->reference->commission;
            $referee->save();
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
