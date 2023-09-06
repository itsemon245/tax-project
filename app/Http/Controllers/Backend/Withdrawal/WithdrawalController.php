<?php

namespace App\Http\Controllers\Backend\Withdrawal;

use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Setting;

class WithdrawalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $withdrawals = Withdrawal::with('user')->where('status', $request->status)->paginate(paginateCount());
        return view('backend.withdrawal.viewAllWthdrawal', compact('withdrawals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'account_type' => 'required',
            'account_no' => 'required|string',
            'amount' => 'required|numeric',
        ]);
        $withdrawLimit = Setting::first()->reference->withdrawal;
        if ($request->amount < $withdrawLimit) {
            $notification = [
                'message' => 'Insufficient Amount',
                'alert-type' => 'error',
            ];
        } elseif ($request->amount > auth()->user()->remaining_temp_commission) {
            $notification = [
                'message' => 'Invalid Amount',
                'alert-type' => 'error',
            ];
        } else {
            $withdrawal = Withdrawal::create($request->all());
            $withdrawal->user_id = $request->user_id;
            $withdrawal->save();
            auth()->user()->remaining_temp_commission = auth()->user()->remaining_temp_commission - $withdrawal->amount;
            auth()->user->save();
            $notification = [
                'message' => 'Withdrawal Request Submitted',
                'alert-type' => 'success',
            ];
        }
        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $parent = User::find($id);
        $withdrawal = Withdrawal::find($request->withdrawal_id);
        $amount = $withdrawal->amount;
        $parent->withdrawn_commission = $parent->withdrawn_commission + $amount;
        $parent->remaining_commission = $parent->total_commission - $parent->withdrawn_commission;
        $parent->save();
        $withdrawal->status = 1;
        $withdrawal->save();
        $notification = [
            'message' => 'Payment Successful',
            'alert-type' => 'success',
        ];


        return redirect()
            ->back()
            ->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $withdrawal = Withdrawal::find($id);
        $withdrawal->delete();
        $notification = [
            'message' => 'Withdrawal Deleted',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }
}
