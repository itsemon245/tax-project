<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FilteredInvoiceResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "userId" => $this->user_id,
            "clientId" => $this->client_id,
            "headerImage" => $this->header_image,
            "referenceNo" => $this->reference_no,
            "note" => $this->note,
            "discount" => $this->pivot ? $this->pivot->discount : null,
            "subTotal" => $this->pivot ? $this->pivot->sub_total : null,
            "total" => $this->pivot ? $this->pivot->demand : null,
            "amountPaid" => $this->pivot ? $this->pivot->paid : null,
            "amountDue" => $this->pivot ? $this->pivot->due : null,
            "paymentNote" => $this->payment_note,
            "paymentMethod" => $this->payment_method,
            "paymentDate" => $this->pivot ? $this->pivot->payment_date : null,
            "dueDate" => $this->pivot ? $this->pivot->due_date : null,
            "issueDate" => $this->pivot ? $this->pivot->issue_date : null,
            "dueDateFormatted" => $this->pivot ? Carbon::parse($this->pivot->due_date)->format('d F, Y') : null,
            "issueDateFormatted" => $this->pivot ? Carbon::parse($this->pivot->issue_date)->format('d F, Y') : null,
            "status" => $this->pivot ? $this->pivot->status : null,
            "createdAt" => $this->created_at,
            "updatedAt" => $this->updated_at,
            "items" => $this->invoiceItems,
            "user" => $this->user,
            "client" => $this->client,
            "pivot" => $this->pivot ? $this->pivot : null
        ];
    }
}
