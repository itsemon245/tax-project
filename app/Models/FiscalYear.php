<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FiscalYear extends Model {
    use HasFactory;
    protected $guarded = [];

    public function invoices() {
        return $this->belongsToMany(Invoice::class)
            ->withPivot([
                'discount',
                'sub_total',
                'demand',
                'paid',
                'due',
                'payment_date',
                'issue_date',
                'due_date',
                'status',
            ]);
    }

    public function userDocs(): HasMany {
        return $this->hasMany(UserDoc::class);
    }
}
