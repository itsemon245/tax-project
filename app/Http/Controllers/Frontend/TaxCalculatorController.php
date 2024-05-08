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
                    'yearly_turnover' => 'nullable|numeric',
                    'total_asset' => 'nullable|numeric',
                    'yearly_income' => 'nullable|numeric',
                    'services' => 'array|nullable',
                    'message' => 'string|nullable',
                ]);

                $others = 0;
                $tax = 0;
                $taxSetting = TaxSetting::where(['for' => $request->tax_for, 'type' => 'tax'])->first();
                $minTax = $taxSetting->min_tax;
                $income = (int) ($request->yearly_income ?? 0);
                $turnover = (int) ($request->yearly_turnover ?? 0);
                $asset = (int) ($request->total_asset ?? 0);
                $assetPercentage = $this->calcTax($asset, $request, 'asset');
                $incomeTaxAll = $this->calcTax($income, $request, 'income');
                $turnoverTaxAll = $this->calcTax($turnover, $request, 'turnover');
                $incomeTax = $incomeTaxAll['tax'];
                $turnoverTax = $turnoverTaxAll['tax'];
                $minTaxApplied = $incomeTax > $turnoverTax ? $incomeTaxAll['min-tax-applied'] : $turnoverTaxAll['min-tax-applied'];
                $originalTax = $incomeTax > $turnoverTax ? $incomeTaxAll['original-tax'] : $turnoverTaxAll['original-tax'];

                $assetTax = ($incomeTax > $turnoverTax) ? $incomeTax * ($assetPercentage / 100) : $turnoverTax * ($assetPercentage / 100);
                $tax = $turnoverTax > $incomeTax ? $turnoverTax : $incomeTax;

                $totalTax = $tax + $assetTax;
                $afterRebate = $totalTax - ((float)$request->rebate ?? 0);
                $actualTax = $afterRebate > $minTax ? $afterRebate : $minTax;
                $afterDeduction = $actualTax - (float)$request->deduction;
                $formatMinTax = currencyFormat($minTax);
                $formattedOriginalTax = currencyFormat($originalTax);
                $afterRebateFormatted = currencyFormat($afterRebate);
                $formattedDeduction = currencyFormat((float)$request->deduction);
                if ($request->tax_for != 'individual') {
                    $less = [
                        "Others Paid" => $originalTax == 0 ? "<div class='text-center' style='border-bottom: 2px solid rgb(14 159 110);'>No Deduction applicable</div>" : "- ".$formattedDeduction
                    ];
                } else {
                    $less = [
                        'Rebate' => "- ".currencyFormat($request->rebate ?? 0),
                        'After Rebate' => $originalTax == 0 ? "<div class='text-center' style='border-bottom: 2px solid rgb(14 159 110);'>{$afterRebateFormatted}</div>" : $afterRebateFormatted,
                        'Apply Min-Tax' => $afterRebate < $minTax && $originalTax > 0 ? currencyFormat($minTax) : 'Not Applied',
                        "Others Paid" => $originalTax == 0 ? "<div class='text-center' style='border-bottom: 2px solid rgb(14 159 110);'>No Deduction applicable</div>" : "- ".$formattedDeduction
                    ];
                }
                $data = [
                    'taxes' => [
                        'a) Tax On Turnover' =>  currencyFormat($turnoverTax),
                        "b) Tax On Income<br>".($originalTax > 0 && $minTax > $originalTax ? "<small>Actual Tax ({$formattedOriginalTax})</small>" : '') =>  currencyFormat($incomeTax),
                        'actual-tax' => $originalTax,
                        '*Tax Paid a or b which is higher'.($minTaxApplied ? "<br> <small>Min. Tax Applied({$formatMinTax})</small>" : '') => currencyFormat($tax),
                    ],
                    'add' => [
                        'WealthTax' => "+ ".currencyFormat($assetTax),
                        '*Total Payable Tax' =>  currencyFormat($totalTax),
                    ],
                    'less' => $less,
                    '*Total Balance Payable' => $originalTax == 0 ? "<div class='text-center' style='border-bottom: 2px solid rgb(14 159 110);'>No tax applicable</div>" : currencyFormat($afterDeduction)
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
     * @return mixed
     */
    public function calcTax(int $value, $request, string $type)
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
            $afterFree = $value - $taxFree;
        } else {
            $taxFree = 0;
            $afterFree = $value - $taxFree;
        }
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
            return $lastValueSlot->tax_percentage ?? 0 ;
        }
        $slotLimit = $lastValueSlot?->to ?? 0;
        $slots = $taxSetting->slots()->where('type', $type)->where('to', '<=', $slotLimit)->get();
        $value = $afterFree;
        $minTaxApplied = false;
        $originalTax = 0;
        if ($slots->count() > 0) {
            foreach ($slots as $key => $slot) {
                $tax = (float) 0;
                /**
                 * Determine the Amount on which tax will be calculated
                 * If it's first calculation then free tax will be deducted
                 * Else the slot difference will be the amount to calculate tax;
                 */

                $amountForTax = $slot->difference < $value ? $slot->difference : $value;
                $tax = $amountForTax * ($slot->tax_percentage / 100);
                $originalTax = $tax;
                if ($type == 'income') {
                    $minTaxApplied = $key == 0 && $minTax > $tax;
                    $tax = $minTaxApplied ? $minTax : $tax;
                }
                if (!($type == 'turnover' && $key == 0)) {
                    $value -= $amountForTax;
                }
                $totalTax += $tax;
                if ($value <= 0) {
                    break;
                }
            }
        }
        return [
            'tax' => $totalTax,
            'original-tax' => $originalTax,
            'min-tax-applied' => $minTaxApplied
        ];
    }

    public function calcOthers(int $value, $request, string $type)
    {
        $otherTaxes = [];
        if ($request->services) {
            foreach ($request->services as $key => $service) {
                $otherTax = 0;
                $othersSetting = TaxSetting::find($service);
                // dd($othersSetting);
                $lastValueSlot = $othersSetting->slots()->where('type', $type)
                ->where('from', '<=', $value)
                ->where('to', '>=', $value)
                ->first() ??
                $othersSetting->slots()->where('type', $type)
                ->where('from', '<=', $value)
                ->latest()->first();
                $diff = ($value - $lastValueSlot->from);
                $plus = $lastValueSlot->is_discount_fixed ? $lastValueSlot->amount : $diff * ($lastValueSlot->amount / 100);
                $tax = $diff + $plus;
                $tax = $lastValueSlot->min_tax > $tax ? (float) $lastValueSlot->min_tax : $tax;
                $otherTaxes[$othersSetting->service][$type] = $tax;
            }
        }

        return $otherTaxes;
    }
}
