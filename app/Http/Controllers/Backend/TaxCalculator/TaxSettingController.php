<?php

namespace App\Http\Controllers\Backend\TaxCalculator;

use App\Models\Slot;
use App\Models\TaxService;
use App\Models\TaxSetting;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class TaxSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taxSettings = TaxSetting::get();
        return view('backend.taxCalculator.settings', compact('taxSettings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.taxCalculator.createSettings');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            "name" => "string|max:255",
            "for" => "required|max:255",
            "type" => "required|max:255",
            "min_tax" => "required|max:255",
        ]);
        $taxSetting = TaxSetting::create($validated);
        $this->setOtherAttributes($request, $taxSetting);
        $taxSetting->save();
        if ($request->type === 'tax') {
            $this->setSlots($request, $taxSetting);
        } else {
            $this->setServices($request, $taxSetting);
        }
        $alert = [
            'alert-type' => 'success',
            'message' => 'Tax Setting Created'
        ];
        return back()->with($alert);
    }

    /**
     * Display the specified resource.
     */
    public function show(TaxSetting $taxSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaxSetting $taxSetting)
    {
        return view('backend.taxCalculator.editSettings', compact('taxSetting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TaxSetting $taxSetting)
    {
        // dd($request->all());
        $validated = $request->validate([
            "name" => "string|max:255",
            "for" => "required|max:255",
            "type" => "required|max:255",
            "min_tax" => "required|max:255",
        ]);
        $updated = $taxSetting->update($validated);
        $this->setOtherAttributes($request, $taxSetting);
        $taxSetting->save();
        if ($request->type === 'tax') {
            $this->setSlots($request, $taxSetting);
        } else {
            $this->setServices($request, $taxSetting);
        }
        $alert = [
            'alert-type' => 'success',
            'message' => 'Tax Setting Updated'
        ];
        return back()->with($alert);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaxSetting $taxSetting)
    {
        $taxSetting->delete();
        $alert = [
            'alert-type' => 'success',
            'message' => 'Tax Setting Deleted'
        ];
        return back()->with($alert);
    }

    public function setOtherAttributes($request, $taxSetting)
    {
        switch ($request->for) {
            case 'company':
                $taxSetting->turnover_percentage = $request->turnover_percentage;
                $taxSetting->income_percentage = $request->income_percentage;
                $taxSetting->asset_percentage = $request->asset_percentage;
                $taxSetting->tax_free = ['amount' => $request->tax_free];
                break;
            case 'firm':
                $taxSetting->tax_free = ['amount' => $request->tax_free];
                break;
            default:
                $taxSetting->tax_free = [
                    'male' => $request->input('tax_free_male'),
                    'female' => $request->input('tax_free_female'),
                ];
                break;
        }
    }

    public function setSlots($request, $taxSetting)
    {
        if ($request->tax_slot_from) {
            foreach ($request->tax_slot_from as $key => $from) {
                $id = $request->slot_ids[$key] ?? null;
                $percentage = $request->slot_percentage[$key];
                $type = $request->slot_types[$key];
                $to = $request->tax_slot_to[$key];
                $difference = $to - $from;
                $slot = Slot::updateOrCreate(['id' => $id], [
                    'tax_setting_id' => $taxSetting->id,
                    'type' => $type,
                    'from' => $from,
                    'to' => $to,
                    'difference' => $difference,
                    'tax_percentage' => $percentage,
                ]);
            }
        }
    }
    public function setServices($request, $taxSetting)
    {
        if ($request->others_slot_from) {
            foreach ($request->others_slot_from as $key => $from) {
                $id = $request->slot_ids[$key] ?? null;
                $service = $request->services[$key];
                $isDiscountFixed = $request->is_discounts_fixed[$key] !== 'false';
                $amount = $request->discount_amounts[$key];
                $to = $request->others_slot_to[$key];
                $difference = $to - $from;
                $slot = Slot::updateOrCreate(['id' => $id], [
                    'tax_setting_id' => $taxSetting->id,
                    'service' => $service,
                    'from' => $from,
                    'to' => $to,
                    'difference' => $difference,
                    'is_discount_fixed' => $isDiscountFixed,
                    'amount' => $amount,
                ]);
            }
        }
    }
}
