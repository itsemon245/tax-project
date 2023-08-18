<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemResource;
use App\Models\Purchase;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index(): View
    {
        return view('frontend.payment.index');
    }
    public function create(string $model, string $id): View
    {
        $table = str(str($model)->snake())->plural();
        $record = DB::table($table)->find($id);
        return view('frontend.pages.payment.create', compact('model', 'id', 'record'));
    }
    public function store(Request $request)
    {
        dd($request->all());
        // Purchase::create([
        //     'user_id' => Auth::user()->id,
        //     'user_id' => Auth::user()->id,
        //     'user_id' => Auth::user()->id,
        //     'user_id' => Auth::user()->id,
        //     'user_id' => Auth::user()->id,
        //     'user_id' => Auth::user()->id,
        //     'user_id' => Auth::user()->id,
        //     'user_id' => Auth::user()->id,
        //     'user_id' => Auth::user()->id,
        //     'user_id' => Auth::user()->id,
        // ]);
    }
    public function success(string $model, int $id): View
    {
        return view('frontend.payment.success');
    }
    public function cancel(): View
    {
        return view('frontend.payment.cancel');
    }
}
