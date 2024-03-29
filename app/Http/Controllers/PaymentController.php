<?php

namespace App\Http\Controllers;

use App\Models\IncomeSource;
use App\Models\Purchase;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class PaymentController extends Controller
{
    public function index(): View
    {
        return view('frontend.payment.index');
    }
    public function create(string $model, string $id, $purchase_id = null): View
    {
        $table          = str(str($model)->snake())->plural();
        $record         = DB::table($table)->find($id);
        $incomeSources  = IncomeSource::latest()->get();
        $paymentMethods = Setting::select('payment')->first()->pluck('payment')[ 0 ];
        $purchase = Purchase::find($purchase_id);
        return view('frontend.pages.payment.create', compact('model', 'id', 'record', 'incomeSources', 'paymentMethods', 'purchase'));
    }
    public function store(Request $request, $purchase_id = null)
    {
        $request->validate([
            'purchasable_type' => 'required',
            'purchasable_id'   => 'required',
            'name'             => 'required',
            'phone'            => 'required',
            'email'            => 'required|email|unique:users,email,' . auth()->id(),
            'paid_amount'      => 'required',
            'payment_method'   => 'required',
            'trx_id'           => 'required',
            'payment_number'   => 'required',
            'password'         => 'nullable|same:confirm_password',
            'confirm_password' => 'nullable|same:password',
         ]);

        try {
            $table = str($request->purchasable_type)->snake();
            $table = str($table)->plural();
            $user  = User::firstOrCreate([
                'email' => $request->input('email'),
             ], [
                'user_name' => explode("@", $request->input('email'))[ 0 ],
                'email'     => $request->input('email'),
                'name'      => $request->input('name'),
                'phone'     => $request->input('phone'),
                'password'  => Hash::make($request->input('password')),
             ]);
            if ($user->wasRecentlyCreated) {
                event(new Registered($user));
                Auth::login($user);
            }
            $record    = DB::table($table)->find($request->purchasable_id);
            $isExpired = null;
            $data      = [
                'payable'  => $record->price,
                'discount' => 0,
             ];
            $expireDate  = null;
            $dueDate     = today()->addDays(10);
            $due         = null;
            $promoCode   = null;
            $status      = 'due';
            $metaData    = null;
            $billingType = $record->billing_type;

            if ($request->income_source) {
                $metaData = json_encode($request->income_source);
            } else {
                $metaData = json_encode($request->metaData);
            }
            switch ($billingType) {
                case 'monthly':
                    $expireDate = today()->addMonth();
                    break;
                case 'yearly':
                    $expireDate = today()->addYear();
                    break;
                case 'onetime':
                    $expireDate = null;
                    break;

                default:
                    break;
            }
            if ($request->input('promo_code') !== null) {
                $promoCode = $user
                    ->promoCodes()
                    ->where('code', $request->promo_code)
                    ->first();
                $data = $this->applyPromoCode($promoCode, $record->price);
                //decrement the promo code limit if all checks passes
                if ($data[ 'discount' ] > 0) {
                    $user->promoCodes()->updateExistingPivot($promoCode->id, [
                        'limit' => $promoCode->limit - 1,
                     ]);
                }
            } else {
                $data = [
                    'payable'  => $record->price,
                    'discount' => 0,
                 ];
            }
            $paid_amount = (int) $request->paid_amount;
            $payable     = $data[ 'payable' ];
            $due         = $payable - $paid_amount;
            if ($due < 0) {
                throw new Exception("You can not pay more than $payable ৳");
            } elseif ($due === 0) {
                $status    = 'paid';
                $isExpired = false;
                $dueDate   = null;
            } elseif ($due > 0 && $due < $payable) {
                $status = 'partial';
            }

            Purchase::updateOrCreate([
                'id' => $request->purchase_id
            ],
                [
                'user_id'                => auth()->id(),
                'name'                   => $request->name,
                'promo_code_id'          => $promoCode->id ?? null,
                'payable_amount'         => $data[ 'payable' ],
                'discount'               => $data[ 'discount' ],
                'has_promo_code_applied' => $promoCode !== null ? true : false,
                'paid'                   => $request->paid_amount,
                'trx_id'                 => $request->trx_id,
                'contact_number'         => $request->phone,
                'payment_number'         => $request->payment_number,
                'payment_method'         => $request->payment_method,
                'billing_type'           => $billingType,
                'due'                    => $due,
                'status'                 => $status,
                'metadata'               => $metaData,
                'is_expired'             => $isExpired,
                'payment_date'           => today(),
                'due_date'               => $dueDate,
                'expire_date'            => $expireDate,
                'purchasable_id'         => $request->purchasable_id,
                'purchasable_type'       => $request->purchasable_type,
             ]);

            // dd($metaData);

        } catch (Exception $e) {
            $notification = [
                'message'    => $e->getMessage(),
                'alert-type' => 'error',
             ];
            return back()->with($notification);
        }

        $notification = [
            'message'    => 'Successfully Payment Completed',
            'alert-type' => 'success',
         ];
        return back()->with($notification);
    }
    public function later(Request $request)
    {
        $request->validate([
            'purchasable_type' => 'required',
            'purchasable_id'   => 'required',
            'name'             => 'required',
            'phone'            => 'required',
            'email'            => 'required|email|unique:users,email,' . auth()->id(),
            'password'         => 'nullable|same:confirm_password',
            'confirm_password' => 'nullable|same:password',
         ]);

        $table     = str($request->purchasable_type)->snake();
        $table     = str($table)->plural();
        $record    = DB::table($table)->find($request->purchasable_id);
        $isExpired = null;
        $data      = [
            'payable'  => $record->price,
            'discount' => 0,
         ];
        $expireDate  = null;
        $dueDate     = today()->addDays(10);
        $due         = $record->price;
        $status      = 'due';
        $metaData    = null;
        $billingType = $record->billing_type;
        $user        = User::firstOrCreate([
            'email' => $request->input('email'),
         ], [
            'user_name' => explode("@", $request->input('email'))[ 0 ],
            'email'     => $request->input('email'),
            'name'      => $request->input('name'),
            'phone'     => $request->input('phone'),
            'password'  => Hash::make($request->input('password')),
         ]);
        if ($user->wasRecentlyCreated) {
            event(new Registered($user));
            Auth::login($user);
        }

        Purchase::create([
            'user_id'          => $user->id,
            'name'             => $request->name,
            'payable_amount'   => $data[ 'payable' ],
            'contact_number'   => $request->phone,
            'billing_type'     => $billingType,
            'due'              => $due,
            'status'           => $status,
            'metadata'         => $metaData,
            'is_expired'       => $isExpired,
            'payment_date'     => today(),
            'due_date'         => $dueDate,
            'expire_date'      => $expireDate,
            'purchasable_id'   => $request->purchasable_id,
            'purchasable_type' => $request->purchasable_type,
         ]);

        $notification = [
            'message'    => 'Request Submitted Successfully',
            'alert-type' => 'success',
         ];
        return back()->with($notification);
    }

    public function success(string $model, int $id): View
    {
        return view('frontend.payment.success');
    }
    public function cancel(): View
    {
        return view('frontend.payment.cancel');
    }

    public function applyPromoCode($promoCode, $price)
    {
        $discount  = null;
        $payable   = null;
        $expire    = Carbon::parse($promoCode->expired_at);
        $isExpired = today()->gt($expire);
        if ($promoCode === null) {
            throw new Exception('Invalid promo code!');
        } elseif ($isExpired) {
            throw new Exception('Promo code expired at ' . $expire->format('d F, Y') . '!');
        } elseif ($promoCode->pivot->limit < 1) {
            throw new Exception('Limit Exceeded!');
        } else {
            $discount = $promoCode->is_discount ? $price * ($promoCode->amount / 100) : $promoCode->amount;
            $discount = round($discount, 2);
            $payable  = $price - $discount;
        }
        return [
            'payable'  => $payable,
            'discount' => $discount,
         ];
    }

    public function payNow(Request $request, Purchase $purchase)
    {
        $request->validate([
            'trx_id' => 'required',
         ]);
        $billingType = $purchase->purchasable?->billing_type;
        switch ($billingType) {
            case 'monthly':
                $expireDate = today()->addMonth();
                break;
            case 'yearly':
                $expireDate = today()->addYear();
                break;
            case 'onetime':
                $expireDate = null;
                break;

            default:
                $expireDate = null;
                break;
        }
        $purchase->trx_id       = $request->trx_id;
        $purchase->paid         = $purchase->payable_amount;
        $purchase->due          = 0;
        $purchase->status       = 'paid';
        $purchase->expire_date  = $expireDate;
        $purchase->due_date     = null;
        $purchase->payment_date = today();
        $purchase->update();
        $alert = [
            'alert-type' => 'success',
            'message'    => 'Submitted for review',
         ];
        return back()->with($alert);
    }
}
