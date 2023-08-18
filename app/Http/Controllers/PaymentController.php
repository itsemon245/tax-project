<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
            'payable' => 'required',
            'name' => 'required',
            'paid_amount' => 'nullable|required',
            'trx_id' => 'nullable|required',
            'phone' => 'nullable|required',
            'payent_number' => 'nullable|required',
        ]);

        if ($request->promo_code !== null) {
            $promoCode = PromoCode::where('code', $request->promo_code)->first();
            if ($promoCode) {
                $promoCodeUserCount = DB::table('promo_code_user')
                    ->where('promo_code_id', $promoCode->id)
                    ->count();
                if ($promoCodeUserCount === 1) {
                    $promoCodeUser = DB::table('promo_code_user')
                        ->where('promo_code_id', $promoCode->id)
                        ->first();
                    --$promoCodeUser->limit;
                } else {
                    $promoCodeUsers = DB::table('promo_code_user')
                        ->where('promo_code_id', $promoCode->id)
                        ->get();
                    foreach ($promoCodeUsers as $promoCodeUser) {
                        --$promoCodeUser->limit;
                    }
                }
            }else {
                $notification = [
                    'message' => 'Please Enter Valid PromoCode',
                    'alert-type' => 'error',
                ];
                return back()->with($notification);
            }
        } 

        $paid_amount = $request->paid_amount;
        $payable = $request->payable;
        $due = null;
        if ($paid_amount > $payable) {
            $notification = [
                'message' => 'Please Enter Correct Amount',
                'alert-type' => 'error',
            ];
            return back()->with($notification);
        }elseif($paid_amount === null){
            $due= $payable;
        }elseif($paid_amount){
            $due = $payable - $paid_amount;
        }
      
        $dueAmount= $due;
        
        $billing= "monthly";
        $expireDate = null; 
        if($billing === "monthly")
        {
            $currentDateTime = Carbon::now();
            $expireDate = $currentDateTime->addMonth();
            $expireDate;
        }elseif($billing === "yearly"){
            $currentDateTime = Carbon::now();
            $expireDate = $currentDateTime->addYear();
            $expireDate;
        }elseif($billing === "onetime"){
            $expireDate ="onetime";
            $expireDate;
        }

        $expire= $expireDate;

        $result= null;
        if($request->is_promo_code_applied === true)
        {
            $result = 1;
            $result;
        }else{
            $result = 0;
            $result;
        }

        $applied= $result;

        Purchase::create([
            'user_id' => Auth::user()->id,
            'promo_code_id' => $promoCode->id ?? null,
            'payable_amount' => $request->payable ?? null,
            'discount' => $request->discount,
            'has_promo_code_applied' => $applied,
            'paid' => $request->paid_amount,
            'trx_id' => $request->trx_id,
            'contact_number' => $request->phone,
            'payment_number' => $request->payent_number,
            'billing_type' => $request->billing_type,
            'due' => $dueAmount,
            'payment_date' => Carbon::now(),
            'expire_date' => $expire,
            'purchasable_id' => $request->purchasable_id,
            'purchasable_type' => $request->purchasable_type,
        ]);

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
