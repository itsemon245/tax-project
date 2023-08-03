<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // $items = array_map(function ($item) {
        //     return [
        //         'id'=> $item->id -1,
        //     ];
        // }, $this->invoiceItems);
        return [
            "id" => $this->id,
            "userId" => $this->user_id,
            "clientId" => $this->client_id,
            "headerImage" => $this->header_image,
            "referenceNo" => $this->reference_no,
            "note" => $this->note,
            "discount" => $this->pivot->discount,
            "subTotal" => $this->pivot->sub_total,
            "total" => $this->pivot->demand,
            "amountPaid" => $this->pivot->paid,
            "amountDue" => $this->pivot->due,
            "paymentNote" => $this->payment_note,
            "paymentMethod" => $this->payment_method,
            "paymentDate" => $this->pivot->payment_date,
            "dueDate" => $this->pivot->due_date,
            "issueDate" => $this->pivot->issue_date,
            "status" => $this->pivot->status,
            "createdAt" => $this->created_at,
            "updatedAt" => $this->updated_at,
            "items" => $this->invoiceItems,
            "user" => $this->user,
            "client" => $this->client,
        ];
    }
}
