<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\TaxSetting;
use Illuminate\Http\Request;

class TaxCalculatorController extends Controller
{
    public function calculator()
    {
        $settings = TaxSetting::where('type', 'others')->get()->groupBy('for');
        return view('frontend.pages.taxCalculator', compact('settings'));
    }
    public function calculate(Request $request)
    {
        $request->validate([
            "name" => "required|string",
            "email" => "required|email",
            "phone" => "required|string",
            "income_source" => "string|nullable",
            "yearly_turnover" => "required|numeric",
            "total_asset" => "required|numeric",
            "yearly_income" => "required|numeric",
            "gender" => "required|string",
            "services" => 'array|nullable',
            "message" => "string|nullable",
        ]);
        $income = (int) $request->yearly_income;
        $turnover = (int) $request->yearly_turnover;
        $asset = (int) $request->total_asset;
        $incomeTax = $this->getTax($income, $request->tax_for, 'income');
        // $turnoverTax = $this->getTax($turnover, $request->tax_for, 'turnover');
        // $assetTax = $this->getTax($asset, $request->tax_for, 'asset');
        dd([
            'taxes' => [
                'income' => $incomeTax,
                // 'asset' => $assetTax,
                // 'turnover' => $turnoverTax,
            ]
        ]);
        return view('frontend.pages.taxCalculator');
    }
    public function result()
    {
        return view('frontend.pages.taxCalculator');
    }


    function getTax(int $value, string $for, string $type): int
    {
        $totalTax = 0;
        $taxSetting = TaxSetting::where(['for' => 'individual', 'type' => 'tax'])->first();
        $valueSlots = $taxSetting->slots()->where('type', $type)->get();
        $lastValueSlot = $valueSlots->where('to', '>=', $value)->first();

        foreach ($valueSlots as $slot) {
            $tax = (float) 0;
            if ($slot->difference < $value) {
                $tax =  $slot->difference * $slot->tax_percentage / 100;
                $tax = $tax > $slot->min_tax ? $tax : $slot->min_tax;
                $value -= $slot->difference;
            } else {
                $tax =  $value * $slot->tax_percentage / 100;
                $tax = $tax > $slot->min_tax ? $tax : $slot->min_tax;
            }
            $totalTax += $tax;

            if ($slot->id === $lastValueSlot->id) {
                break;
            }
        }
        return $totalTax;
    }
}
