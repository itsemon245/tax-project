<?php

namespace App\Http\Controllers\Backend\TaxCalculator;

use App\Models\TaxSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slot;
use App\Models\TaxService;

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
        $validated = $request->validate([
            "name" => "string|max:255",
            "for" => "required|max:255",
            "type" => "required|max:255",
            "turnover_percentage" => "required|numeric",
            "tax_free_male" => "required|numeric",
            "tax_free_female" => "required|numeric",
        ]);
        $taxSetting = TaxSetting::create($request->only(['name', 'for', 'type', 'turnover_percentage']));
        $taxSetting->tax_free = [
            'male' => $request->input('tax_free_male'),
            'female' => $request->input('tax_free_female'),
        ];
        $taxSetting->save();
        $slotTypes = $request->input('slot_types');
        foreach ($slotTypes as $key => $type) {
            // slot attributes
            $percentage = $request->slot_percentage[$key];
            $min_tax = $request->slot_min_tax[$key];
            $from = $request->slot_from[$key];
            $to = $request->slot_to[$key];
            $difference = $to - $from;

            $slot = Slot::create([
                'tax_setting_id' => $taxSetting->id,
                'type' => $type,
                'min_tax' => $min_tax,
                'from' => $from,
                'to' => $to,
                'difference' => $difference,
                'tax_percentage' => $percentage,
            ]);
            $index = $key + 1;
            $slotServices = $request['slot_' . $index . '_services'];
            if ($slotServices) {
                foreach ($slotServices as $i => $service) {
                    $data = [
                        'slot_id' => $slot->id,
                        'tax_setting_id' => $taxSetting->id,
                        'name' => $service,
                        'is_discount' => $request['slot_' . $index . '_is_discounts'][$i] ? true : false,
                        'amount' => $request['slot_' . $index . '_discount_amounts'][$i],
                    ];
                    $taxService = TaxService::create($data);
                }
            }
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
            "turnover_percentage" => "required|numeric",
            "tax_free_male" => "required|numeric",
            "tax_free_female" => "required|numeric",
        ]);
        $updated = $taxSetting->update($request->only(['name', 'for', 'type', 'turnover_percentage']));
        $taxSetting->tax_free = [
            'male' => $request->input('tax_free_male'),
            'female' => $request->input('tax_free_female'),
        ];
        $taxSetting->update();
        $slotTypes = $request->input('slot_types');
        foreach ($slotTypes as $key => $type) {
            // slot attributes
            $id = $request->slot_ids[$key] ?? null;
            $percentage = $request->slot_percentage[$key];
            $min_tax = $request->slot_min_tax[$key];
            $from = $request->slot_from[$key];
            $to = $request->slot_to[$key];
            $difference = $from - $to;
            $slot = null;
            if ($id) {
                $slot = Slot::find($id);
                $slot->update([
                    'tax_setting_id' => $taxSetting->id,
                    'type' => $type,
                    'min_tax' => $min_tax,
                    'from' => $from,
                    'to' => $to,
                    'difference' => $difference,
                    'tax_percentage' => $percentage,
                ]);
            } else {
                $slot = Slot::create([
                    'tax_setting_id' => $taxSetting->id,
                    'type' => $type,
                    'min_tax' => $min_tax,
                    'from' => $from,
                    'to' => $to,
                    'difference' => $difference,
                    'tax_percentage' => $percentage,
                ]);
            }

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
                    if ($serviceId) {
                        $taxService = TaxService::find($serviceId)->update($data);
                    } else {
                        $taxService = TaxService::create($data);
                    }
                }
            }
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
}
