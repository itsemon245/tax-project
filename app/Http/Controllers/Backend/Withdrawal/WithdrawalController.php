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
        $withdrawals = Withdrawal::with('user')->where('status', $request->status)->latest()->paginate(paginateCount());
        return view('backend.withdrawal.viewAllWthdrawal', compact('withdrawals'));
    }
    /**
     * Display a listing of the resource.
     */
    public function referees()
    {
        $referees = User::has('referees')->paginate(paginateCount());
        return view('backend.withdrawal.view-referees', compact('referees'));
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
        $user = User::find($id);
        $withdrawal = Withdrawal::find($request->withdrawal_id);
        $amount = $withdrawal->amount;
        $user->withdrawn_commission = $user->withdrawn_commission + $amount;
        $user->remaining_commission = $user->total_commission - $user->withdrawn_commission;
        $user->save();
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
