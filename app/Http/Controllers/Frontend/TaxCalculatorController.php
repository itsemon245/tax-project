<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\TaxSetting;
use Illuminate\Http\Request;

class TaxCalculatorController extends Controller
{
    public function calculator()
    {
        $settings = TaxSetting::get()->groupBy('for');
        return view('frontend.pages.taxCalculator', compact('settings'));
    }
    public function calculate(Request $request)
    {
        // $request->dd();
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
        $tax = 0;
        $totalTax = 0;
        $taxSetting = TaxSetting::where(['for' => $request->tax_for, 'type' => 'tax'])->first();
        $minTax = $taxSetting->min_tax;
        $income = (int) $request->yearly_income;
        $turnover = (int) $request->yearly_turnover;
        $asset = (int) $request->total_asset;
        $incomeTax = $this->calcTax($income, $request, 'income');
        $turnoverTax = $this->calcTax($turnover, $request, 'turnover');
        $assetTax = $this->calcTax($asset, $request, 'asset');

        $tax = ($incomeTax > $turnoverTax) ? $incomeTax + $assetTax : $turnoverTax + $assetTax;
        $rebate = (int) $request->rebate;
        $afterRebate = $tax - $rebate;
        $totalTax = $minTax > $afterRebate ? $minTax : $afterRebate;
        dd($totalTax);
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


    function calcTax(int $value, $request, string $type): int
    {
        $for = $request->tax_for;
        $gender = $request->gender;
        $totalTax = 0;
        $taxSetting = TaxSetting::where(['for' => $for, 'type' => 'tax'])->first();
        // dd($taxSetting);
        $valueSlots = $taxSetting->slots()->where('type', $type)->get();
        $minTax = $taxSetting->min_tax;
        $lastValueSlot = $valueSlots
            ->where('to', '>=', $value)
            ->where('from', '<=', $value)
            ->first();

        if ($gender) {
            $value -= $gender === 'male' ? $taxSetting->tax_free->male : $taxSetting->tax_free->female;
        } else {
            $value -= $taxSetting->tax_free->amount;
        }
        // dd($value);
        foreach ($valueSlots as $key => $slot) {
            $tax = (float) 0;
            if ($slot->difference < $value) {
                $tax =  $slot->difference * $slot->tax_percentage / 100;
                $tax = ($tax < $minTax && $key === 0) ? $minTax : $tax;
                $value -= $slot->difference;
            } elseif ($value > 0) {
                $tax =  $value * $slot->tax_percentage / 100;
                $tax = ($tax < $minTax && $key === 0) ? $minTax : $tax;
                $value = 0;
            }
            $totalTax += $tax;
            if ($slot->id === $lastValueSlot->id || $value <= 0) {
                break;
            }
        }
        return $totalTax;
    }
}
