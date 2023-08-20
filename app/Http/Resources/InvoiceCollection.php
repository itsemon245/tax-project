<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class InvoiceCollection extends ResourceCollection
{
    private $year;

    public function __construct($resource, $year)
    {
        parent::__construct($resource);
        $this->year = $year;
    }
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            $this->collection->map(function ($invoice) {
                return [
                    "id" => $invoice->id,
                    "userId" => $invoice->user_id,
                    "clientId" => $invoice->client_id,
                    "headerImage" => $invoice->header_image,
                    "referenceNo" => $invoice->reference_no,
                    "note" => $invoice->note,
                    "discount" => $this->getPivot($invoice)->discount,
                    "subTotal" => $this->getPivot($invoice)->sub_total,
                    "demand" => $this->getPivot($invoice)->demand,
                    "amountPaid" => $this->getPivot($invoice)->paid,
                    "amountDue" => $this->getPivot($invoice)->due,
                    "paymentNote" => $invoice->payment_note,
                    "paymentMethod" => $invoice->payment_method,
                    "paymentDate" => $this->getPivot($invoice)->payment_date,
                    "dueDate" => $this->getPivot($invoice)->due_date,
                    "issueDate" => $this->getPivot($invoice)->issue_date,
                    "dueDateFormatted" => Carbon::parse($this->getPivot($invoice)->due_date)->format('d F, Y'),
                    "issueDateFormatted" => Carbon::parse($this->getPivot($invoice)->issue_date)->format('d F, Y'),
                    "status" => $this->getPivot($invoice)->status,
                    "createdAt" => $invoice->created_at,
                    "updatedAt" => $invoice->updated_at,
                    "items" => $invoice->invoiceItems,
                    "user" => $invoice->user,
                    "client" => $invoice->client,
                    "pivot" => $this->getPivot($invoice)
                ];
            }),
        ];
    }


    private function getPivot($invoice)
    {
        // Fetch the additional item based on the variable and the invoice instance
        // You can use any logic here based on your requirements
        return $invoice->fiscalYears()->where('year', $this->year)->first()->pivot;
    }
}
