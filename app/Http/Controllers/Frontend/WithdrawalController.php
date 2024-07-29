<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

class WithdrawalController extends Controller {
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'account_type' => 'required',
            'account_no' => 'required|string',
            'amount' => 'required|numeric',
        ]);
        $withdrawLimit = Setting::first()->reference->withdrawal;
        $user = User::find(auth()->id());

        if (!$user->canWithdraw()) {
            $notification = [
                'message' => 'You are not eligible',
                'alert-type' => 'error',
            ];
        } else {
            $withdrawal = Withdrawal::create($request->all());
            $withdrawal->user_id = auth()->id();
            $withdrawal->save();
            $user->remaining_commission = $user->remaining_commission - $withdrawal->amount;
            $user->save();
            $notification = [
                'message' => 'Withdrawal Request Submitted',
                'alert-type' => 'success',
            ];
        }

        return back()->with($notification);
    }
}
