<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Purchase;
use App\Models\PromoCode;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ItemResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Exists;

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

        $request->validate([
            'purchasable_type' => 'required',
            'purchasable_id' => 'required',
            'payable' => 'required|numeric',
            'name' => 'required',
            'phone' => 'required',
            'paid_amount' => 'required_with:pay_later',
            'trx_id' => 'required_with:pay_later',
            'payment_number' => 'required_with:pay_later',
            'promo_code' => 'required_with:pay_later',
        ]);

        try {
            $isExpired = null;
            $expireDate = null;
            $status = 'due';
            $due = null;
            if ($request->pay_later !== null) {
                $paid_amount = (int)$request->paid_amount;
                $payable = (int)$request->payable;
                $due = $payable - $paid_amount;
                if ($due < 0) {
                    throw new Exception("You can't pay more than payable amount");
                } elseif ($due === 0) {
                    $status = 'paid';
                } elseif ($due > 0 && $due < $payable) {
                    $status = 'partial';
                }

                $billingType = $request->input('billing_type') ?? null;
                $expireDate = null;
                switch ($billingType) {
                    case 'monthly':
                        $expire = today()->addMonth();
                        break;
                    case 'yearly':
                        $expire = today()->addYear();
                        break;
                    case 'onetime':
                        $expire = null;
                        break;

                    default:
                        $expire = null; //TODO: remove these code when billingType is added
                        break;
                }
                // find to fetch promo code
                $user = User::find(auth()->id());
                $promoCode = $user->promoCodes()->where('code', $request->promo_code)->first();

                // check for possible conditions
                if ($promoCode === null) {
                    throw new Exception('Invalid promo code!');
                }
                $expire = Carbon::parse($promoCode->expired_at);
                $hasExpired = today()->gt($expire);
                if ($hasExpired) {
                    throw new Exception('Promo code expired at ' . $expire->format('d F, Y') . "!");
                }
                if ($promoCode->pivot->limit < 1) {
                    throw new Exception('Limit Exceeded!');
                }

                //decrement the promo code limit if all checks passes
                $user->promoCodes()->updateExistingPivot($promoCode->id, [
                    'limit' => $promoCode->limit - 1,
                ]);
            }
            Purchase::create([
                'user_id' => auth()->id(),
                'name' => $request->name,
                'promo_code_id' => $promoCode->id ?? null,
                'payable_amount' => $request->payable ?? null,
                'discount' => $request->discount,
                'has_promo_code_applied' => $request->is_promo_code_applied == "true" ? true : false,
                'paid' => $request->paid_amount,
                'trx_id' => $request->trx_id,
                'contact_number' => $request->phone,
                'payment_number' => $request->payment_number,
                'billing_type' => $request->billing_type,
                'due' => $due,
                'status' => $status,
                'is_expired' => $isExpired,
                'payment_date' => today(),
                'expire_date' => $expireDate,
                'purchasable_id' => $request->purchasable_id,
                'purchasable_type' => $request->purchasable_type,
            ]);
        } catch (Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error',
            ];
            return back()->with($notification);
        }

        $notification = [
            'message' => 'Successfully Payment Completed',
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
}
