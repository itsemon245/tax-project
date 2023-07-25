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


    protected static function booted(): void
    {
        static::updating(function (Invoice $invoice) {
            $invoice->setUpdatedAt(now());
        });
    }
}
