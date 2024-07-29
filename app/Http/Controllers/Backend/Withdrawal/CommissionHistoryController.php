<?php

namespace App\Http\Controllers\Backend\Withdrawal;

use App\Http\Controllers\Controller;
use App\Models\User;

class CommissionHistoryController extends Controller {
    public function index(User $user) {
        $histories = $user->commissionHistories()->with('referee')->paginate(paginateCount());

        return view('backend.withdrawal.commission-history', compact('histories', 'user'));
    }
}
