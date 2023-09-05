<?php

namespace App\Http\Controllers\Backend\PromoCode;

use App\Models\User;
use App\Mail\TestMail;
use App\Models\PromoCode;
use App\Mail\PromoCodeCreated;
use App\Models\UserNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StorePromoCodeRequest;
use App\Notifications\PromoCodeNotification;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\UpdatePromoCodeRequest;

class PromoCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promos = PromoCode::with('user:id,name')->simplePaginate(paginateCount(20));
        return view('backend.promoCode.viewPormoCode', compact('promos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.promoCode.createPromoCode');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePromoCodeRequest $request)
    {
        // dd($request->all());
        $promoCode = PromoCode::create(
            [
                'code' => $request->code,
                'amount' => $request->amount,
                'is_discount' => $request->is_discount === "false" ? false : true,
                'expired_at' => $request->expired_at
            ]
        );

        $users = []; // Replace with the user you want to notify
        switch ($request->user_type) {
            case 'all':
                $users = User::get();
                break;
            case 'partner':
                $users = User::role('partner')->get();
                break;
            case 'user':
                $users = User::role('user')->get();
                break;
            case 'individual':
                $users = User::where('id', $request->user_id)->get();
                break;

            default:
                break;
        }
        foreach ($users as $user) {
            $user->promoCodes()->attach($promoCode->id, ['limit' => $request->limit]);
            $user->notify(new PromoCodeNotification($promoCode));
        }
        return redirect()
            ->route("promo-code.index")
            ->with(array(
                'message' => "Promo Code Created Successfully",
                'alert-type' => 'success',
            ));
    }

    /**
     * Display the specified resource.
     */
    public function show(PromoCode $promoCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(PromoCode $promoCode)
    // {
    //     return view('backend.promoCode.editPromoCode', compact('promoCode'));
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdatePromoCodeRequest $request, PromoCode $promoCode)
    // {
    //     // dd($request->all());
    //     $promoCode->update(
    //         [
    //             'code' => $request->code,
    //             'amount' => $request->amount,
    //             'is_discount' => $request->is_discount === "false" ? false : true,
    //             'expired_at' => $request->expired_at
    //         ]
    //     );

    //     $users = []; // Replace with the user you want to notify
    //     switch ($request->user_type) {
    //         case 'all':
    //             $users = User::get();
    //             break;
    //         case 'partner':
    //             $users = User::role('partner')->get();
    //             break;
    //         case 'user':
    //             $users = User::role('user')->get();
    //             break;
    //         case 'individual':
    //             $users = User::where('id', $request->user_id)->get();
    //             break;

    //         default:
    //             break;
    //     }
    //     foreach ($users as $user) {
    //         $user->promoCodes()->detach($promoCode->id);
    //         // Mail::to('mojahid@wisedev.xyz')
    //         //     ->queue(new TestMail());
    //     }

    //     return redirect()
    //         ->route("promo-code.index")
    //         ->with(array(
    //             'message' => "Promo Code Updated Successfully",
    //             'alert-type' => 'success',
    //         ));
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PromoCode $promoCode)
    {
        PromoCode::find($promoCode->id)->delete();
        return back()->with(array(
            'message' => "Promo Code Deleted Successfully",
            'alert-type' => 'success',
        ));
    }

    /**
     * Get User According User Type
     */
    public function getUsers()
    {
        $users = User::all();
        return $users;
    }
}
