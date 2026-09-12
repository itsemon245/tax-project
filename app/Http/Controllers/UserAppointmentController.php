<?php

namespace App\Http\Controllers;

use App\Models\UserAppointment;
use Illuminate\Http\Request;

class UserAppointmentController extends Controller {
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'date' => ['required', 'date'],
            'expert_id' => ['nullable', 'exists:expert_profiles,id'],
            'time' => ['required', 'date_format:H:i'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'district' => ['required', 'string', 'max:255'],
            'thana' => ['required', 'string', 'max:255'],
            'location' => ['nullable', 'required_if:is_physical,1', 'exists:maps,id'],
            'is_physical' => ['required', 'boolean'],
            'user_id' => ['nullable', 'exists:users,id'],
        ]);

        $appointment = UserAppointment::create([
            'date' => $validated['date'],
            'expert_profile_id' => $validated['expert_id'] ?? null,
            'time' => $validated['time'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'district' => $validated['district'],
            'thana' => $validated['thana'],
            'map_id' => $validated['location'] ?? null,
            'is_physical' => (bool) $validated['is_physical'],
            'user_id' => $validated['user_id'] ?? null,
        ]);
        $alert = [
            'alert-type' => 'success',
            'message' => 'Request Submitted',
        ];

        return back()->with($alert);
    }
}
