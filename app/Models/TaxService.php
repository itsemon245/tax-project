<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaxService extends Model
{
    use HasFactory;
    protected $guarded = [];

    function slot(): BelongsTo
    {
        return $this->belongsTo(Slot::class);
    }
}
