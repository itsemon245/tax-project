<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Slot extends Model
{
    use HasFactory;
    protected $guarded = [];


    function taxSettings(): BelongsTo
    {
        return $this->belongsTo(TaxSetting::class);
    }
    function taxServices(): HasMany
    {
        return $this->hasMany(TaxService::class);
    }
}
