<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentController extends Controller
{
    public function index(): View
    {
        return view('frontend.payment.index');
    }
    public function create(int $id, string $slug): View
    {
        return view('frontend.payment.create');
    }
    public function store(int $id, string $slug)
    {
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
