<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index(): View
    {
        return view('frontend.payment.index');
    }
    public function create(string $model, string $slug, string $id): View
    {
        return view('frontend.pages.payment.create');
    }
    public function store( string $model, Request $request)
    {
        Purchase::create([
            'user_id'=> Auth::user()->id,
            'user_id'=> Auth::user()->id,
            'user_id'=> Auth::user()->id,
            'user_id'=> Auth::user()->id,
            'user_id'=> Auth::user()->id,
            'user_id'=> Auth::user()->id,
            'user_id'=> Auth::user()->id,
            'user_id'=> Auth::user()->id,
            'user_id'=> Auth::user()->id,
            'user_id'=> Auth::user()->id,
        ]);
    }
    public function success(int $id, string $slug): View
    {
        return view('frontend.payment.success');
    }
    public function cancel(): View
    {
        return view('frontend.payment.cancel');
    }
}
