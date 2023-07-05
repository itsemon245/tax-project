<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $totalTax = 0;
        $taxes = [];
        foreach (json_decode($this->taxes) as $key => $value) {
            $taxRate = $value->rate / 100;
            $totalTax += $this->total * $taxRate;
            $tax = [
                'id' => $key,
                'rate'=> $value->rate,
                'name'=> $value->name,
                'number'=> $value->number,
            ];
            $taxes[] = $tax;
        }
        return [
            'id' => $this->id - 1,
            'name'=> $this->name,
            'description'=> $this->description,
            'rate' => $this->rate,
            'qty' => $this->qty,
            'total' => $this->total,
            'taxes' => $taxes,
            'isTaxActive'=> 0,
            'tax'=> round($totalTax, 2)
        ];
    }
}
