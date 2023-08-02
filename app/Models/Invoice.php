<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    function fiscalYears()
    {
        return $this->belongsToMany(FiscalYear::class)
            ->withPivot([
                'discount',
                'sub_total',
                'demand',
                'paid',
                'due',
                'payment_date',
                'issue_date',
                'due_date',
                'status'
            ]);
    }
    function currentFiscal()
    {
        return $this->belongsToMany(FiscalYear::class)
            ->where('year', currentFiscalYear())
            ->withPivot([
                'discount',
                'sub_total',
                'demand',
                'paid',
                'due',
                'payment_date',
                'issue_date',
                'due_date',
                'status'
            ]);
    }

    protected static function booted(): void
    {
        static::updating(function (Invoice $invoice) {
            $invoice->setUpdatedAt(now());
        });
    }
}
