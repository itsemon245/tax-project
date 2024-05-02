<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\TaxCalculator;
use App\Models\TaxSetting;
use App\Models\User;
use Illuminate\Http\Request;

class TaxCalculatorController extends Controller
{
    public function calculator()
    {
        $settings = TaxSetting::get()->groupBy('for');

        return view('frontend.pages.taxCalculator', compact('settings'));
    }

    protected function applyForService(TaxCalculator $result)
    {
        return $result;
    }

    public function calculate(Request $request)
    {
        try {
            if (empty($request->query('result_id'))) {
                $request->validate([
                    'name' => 'required|string',
                    'tax_for' => 'required|string',
                    'email' => 'required|email',
                    'phone' => 'required|string',
                    'income_source' => 'string|nullable',
                    'yearly_turnover' => 'required|numeric',
                    'total_asset' => 'required|numeric',
                    'yearly_income' => 'required|numeric',
                    'services' => 'array|nullable',
                    'message' => 'string|nullable',
                ]);

                $others = 0;
                $tax = 0;
                $taxSetting = TaxSetting::where(['for' => $request->tax_for, 'type' => 'tax'])->first();
                $minTax = $taxSetting->min_tax;
                $income = (int) $request->yearly_income;
                $turnover = (int) $request->yearly_turnover;
                $asset = (int) $request->total_asset;
                $incomeTax = $this->calcTax($income, $request, 'income');
                $turnoverTax = $this->calcTax($turnover, $request, 'turnover');
                $assetPercentage = $this->calcTax($asset, $request, 'asset');

                $assetTax = ($incomeTax > $turnoverTax) ? $incomeTax * ($assetPercentage / 100) : $turnoverTax * ($assetPercentage / 100);
                $tax = $turnoverTax > $incomeTax ? $turnoverTax : $incomeTax;

                $totalTax = $tax + $assetTax;
                $totalDeduction = ($request->has('rebate') ? (float)$request->rebate : 0) + (float)$request->deduction;
                if ($totalTax < $minTax) {
                    $actualTax = $minTax;
                    $less = [
                        'Rebate' => currencyFormat($request->rebate ?? 0),
                        'Min. Tax' => currencyFormat($minTax),
                        'Others Paid' =>  currencyFormat($request->deduction),
                        '*Total Deduction' => "-".currencyFormat($totalDeduction)
                    ];
                } else {
                    $actualTax = $totalTax;
                    $less = [
                        'Rebate' => currencyFormat($request->rebate ?? 0),
                        'Others Paid' =>  currencyFormat($request->deduction),
                        '*Total Deduction' => "-".currencyFormat($totalDeduction)
                    ];
                }
                $afterDeduction = $actualTax - $totalDeduction;
                $data = [
                    'taxes' => [
                        'a) Tax On Turnover' =>  currencyFormat($turnoverTax),
                        'b) Tax On Income' =>  currencyFormat($incomeTax),
                        '*Tax Paid a or b which is higher' => currencyFormat($tax),
                    ],
                    'add' => [
                        'WealthTax' =>  currencyFormat($assetTax),
                        '*Total Payable Tax' =>  currencyFormat($totalTax),
                    ],
                    'less' => $less,
                    '*Total Balance Payable' => currencyFormat($afterDeduction)
                ];
                $incomeOther = $this->calcOthers($income, $request, 'income');
                $turnoverOther = $this->calcOthers($turnover, $request, 'turnover');
                $assetOther = $this->calcOthers($asset, $request, 'asset');
                $otherTaxes = collect($incomeOther)->mergeRecursive($turnoverOther)->mergeRecursive($assetOther);
                $others = [];
                foreach ($otherTaxes as $key => $values) {
                    $max = collect($values)->max();
                    $others = [...$others, $key => $max];
                }
                $result = TaxCalculator::create([
                    ...$request->except('services', '_token', '_method', 'apply', 'result_id'),
                    'tax' => $afterDeduction,
                    'others' => $others,
                    'user_id' => auth()?->id(),
                    'data' => $data
                ]);
                $result->update(['has_applied_for_service' => $request->query('apply') == 'true']);
            } elseif ($request->query('apply') == 'true') {
                $result = TaxCalculator::find($request->query('result_id'));
                $result->update(['has_applied_for_service' => $request->query('apply') == 'true']);

                $alert = [
                    'alert-type' => 'success',
                    'message' => 'Applied Successfully',
                ];

                return redirect('/tax/calculator/results')->with($alert);

            }
        } catch (\Throwable $th) {
            dd($th);
            $alert = [
                'alert-type' => 'error',
                'message' => $th->getMessage(),
            ];

            return back()->with($alert);
        }
        $apply = $request->query('apply') == 'true';

        return view('frontend.pages.taxCalculator.result', compact('result', 'apply'));
    }

    public function results()
    {
        $results = User::find(auth()->id())->taxCalulators;

        return view('frontend.pages.taxCalculator.results', compact('results'));
    }

    public function result($id)
    {
        $result = User::find(auth()->id())->taxCalulators()->find($id);
        $apply = $result->has_applied_for_service;
        return view('frontend.pages.taxCalculator.result', compact('result', 'apply'));
    }

    /**
     * Calculate taxes for income and turnover
     * Returns the total tax for income and turnover
     * Returns the last value slot percentage for Assets
     *
     * @param integer $value
     * @param \Illuminate\Http\Request $request
     * @param string $type
     * @return integer
     */
    public function calcTax(int $value, $request, string $type): int
    {
        $for = $request->tax_for;
        $gender = $request->gender;
        $totalTax = 0;
        $mainValue = $value;
        $taxSetting = TaxSetting::where(['for' => $for, 'type' => 'tax'])->first();
        if ($type == 'income') {
            $taxFree = match ($gender) {
                'male' => (int) $taxSetting->tax_free->male,
                'female' => (int) $taxSetting->tax_free->female,
                null => (int) $taxSetting->tax_free->amount ?? 0,
            };
        } else {
            $taxFree = 0;
        }
        $afterFree = $value - $taxFree;
        $minTax = $taxSetting->min_tax ?? 0;
        $lastValueSlot = $taxSetting->slots()->where('type', $type)
            ->where('from', '<=', $afterFree)
            ->where('to', '>=', $afterFree)
            ->first() ??
            $taxSetting->slots()->where('type', $type)
                ->where('from', '<=', $afterFree)
                ->latest()->first();

        /**
         * For Asset Type just return the last value slot percentage
         */
        if ($type == 'asset') {
            return $lastValueSlot->percentage ?? 0;
        }
        $slotLimit = $lastValueSlot?->to ?? 0;
        $slots = $taxSetting->slots()->where('type', $type)->where('to', '<=', $slotLimit)->get();
        $value = $afterFree;
        if ($for == 'company') {
            $totalTax = $value > $minTax ? $value * $taxSetting[$type.'_percentage'] / 100 : $minTax;
        } elseif ($slots->count() > 0) {
            foreach ($slots as $key => $slot) {
                $tax = (float) 0;
                /**
                 * Determine the Amount on which tax will be calculated
                 * If it's first calculation then free tax will be deducted
                 * Else the slot difference will be the amount to calculate tax;
                 */

                $amountForTax = $slot->difference < $value ? $slot->difference : $value;
                $tax = $amountForTax * ($slot->tax_percentage / 100);
                $tax = $minTax > $tax ? $minTax : $tax;
                $value -= $amountForTax;
                $totalTax += $tax;
                if ($value <= 0) {
                    break;
                }
            }
        }
        return $totalTax;
    }

    public function calcOthers(int $value, $request, string $type)
    {
        $otherTaxes = [];
        if ($request->services) {
            foreach ($request->services as $key => $service) {
                $otherTax = 0;
                $othersSetting = TaxSetting::find($service);
                // dd($othersSetting);
                $valueSlots = $othersSetting->slots()->where('type', $type)->get();
                $lastValueSlot = $valueSlots
                    ->where('to', '>=', $value)
                    ->first() ??
                    $valueSlots
                        ->where('from', '<=', $value)
                        ->last();
                foreach ($valueSlots as $key => $slot) {
                    $minTax = (int) $slot->min_tax ?? 0;
                    $tax = (float) 0;
                    if ($slot->difference < $value) {
                        $tax = $slot->is_discount_fixed ? $slot->amount : $slot->difference * $slot->amount / 100;
                        $tax = $tax < $minTax ? $minTax : $tax;
                        $value -= $slot->difference;
                    } elseif ($value > 0) {
                        $tax = $slot->is_discount_fixed ? $slot->amount : $slot->difference * $slot->amount / 100;
                        $tax = $tax < $minTax ? $minTax : $tax;
                        $value = 0;
                    }
                    $otherTax += $tax;
                    // if ($slot->id === $lastValueSlot->id || $value <= 0) {
                    //     break;
                    // }
                }
                $otherTaxes = [...$otherTaxes, $othersSetting->service => $otherTax];
            }
        }

        return $otherTaxes;
    }
}
