<?php

namespace App\Http\Controllers\Backend\PromoCode;

use App\Models\User;
use App\Models\PromoCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePromoCodeRequest;
use App\Http\Requests\UpdatePromoCodeRequest;

class PromoCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promos = PromoCode::with('user:id,name')->get();
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
        $request->validated();
        PromoCode::create(
            [
                'user_type' => $request->user_type,
                'user_id' => $request->user_id,
                'code' => $request->code,
                'limit' => $request->limit,
                'expired_at' => $request->expired_at
            ]
        );

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
    public function edit(PromoCode $promoCode)
    {
        return view('backend.promoCode.editPromoCode', compact('promoCode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePromoCodeRequest $request, PromoCode $promoCode)
    {
        $request->validated();
        PromoCode::find($promoCode->id)
            ->update(
                [
                    'user_type' => $request->user_type,
                    'user_id' => $request->user_id,
                    'code' => $request->code,
                    'limit' => $request->limit,
                    'expired_at' => $request->expired_at
                ]
            );

        return redirect()
            ->route("promo-code.index")
            ->with(array(
                'message' => "Promo Code Updated Successfully",
                'alert-type' => 'success',
            ));
    }

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
    public function getUsers($userType)
    {
        $users = User::role($userType)->get(['id', 'name']);
        return $users;
    }
}
