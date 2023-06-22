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
        return [
            "id"=> $this->id,
            "userId"=> $this->user_id,
            "clientId"=> $this->client_id,
            "headerImage"=> $this->header_image,
            "referenceNo"=> $this->reference_no,
            "note"=> $this->note,
            "discount"=> $this->discount,
            "subTotal"=> $this->sub_total,
            "total"=> $this->total,
            "amountPaid"=> $this->amount_paid,
            "amountDue"=> $this->amount_due,
            "paymentNote"=> $this->payment_note,
            "paymentMethod"=>$this->payment_method,
            "paymentDate"=> $this->payment_date,
            "dueDate"=> $this->due_date,
            "issueDate"=> $this->issue_date,
            "status"=> $this->status,
            "createdAt"=> $this->created_at,
            "updatedAt"=> $this->updated_at,
            "items"=> $this->invoiceItems,
            "user"=> $this->user,
            "client"=> $this->client,
        ];

        
    }
}
