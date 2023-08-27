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
        dd($request->all());
        $validated = $request->validate([
            "name" => "string|max:255",
            "for" => "required|max:255",
            "type" => "required|max:255",
            "min_tax" => "required|max:255",
        ]);
        $taxSetting = TaxSetting::create($validated);
        $this->setOtherAttributes($request, $taxSetting);
        $taxSetting->save();
        $this->setSlotsAndServices($request, $taxSetting);
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
        $this->setSlotsAndServices($request, $taxSetting);
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

    public function setSlotsAndServices($request, $taxSetting)
    {
        $slotTypes = $request->input('slot_types');
        if ($slotTypes) {
            foreach ($slotTypes as $key => $type) {
                // slot attributes
                $id = $request->slot_ids[$key] ?? null;
                $percentage = $request->slot_percentage[$key];
                $from = $request->slot_from[$key];
                $to = $request->slot_to[$key];
                $difference = $from - $to;
                $slot = null;
                $slot = Slot::updateOrCreate(['id' => $id], [
                    'tax_setting_id' => $taxSetting->id,
                    'type' => $type,
                    'from' => $from,
                    'to' => $to,
                    'difference' => $difference,
                    'tax_percentage' => $percentage,
                ]);

                $index = $key + 1;
                $slotServices = $request['slot_' . $index . '_services'];
                if ($slotServices) {
                    foreach ($slotServices as $i => $service) {
                        $serviceId = $request['slot_' . $index . '_service_ids'][$i] ?? null;
                        $data = [
                            'slot_id' => $slot->id,
                            'tax_setting_id' => $taxSetting->id,
                            'name' => $service,
                            'is_discount' => $request['slot_' . $index . '_is_discounts'][$i] ? true : false,
                            'amount' => $request['slot_' . $index . '_discount_amounts'][$i],
                        ];
                        $taxService = TaxService::updateOrCreate(['id', $serviceId], [$data]);
                    }
                }
            }
        }
    }
}
