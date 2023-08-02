<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiscalYear extends Model
{
    use HasFactory;
    protected $guarded = [];

    function invoices()
    {
        return $this->belongsToMany(Invoice::class);
    }
}
