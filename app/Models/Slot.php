<?php

namespace App\Models;

use App\Casts\Currency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Slot extends Model {
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        // 'from' => Currency::class,
        // 'to' => Currency::class,
        // 'difference' => Currency::class,
        // 'min_tax' => Currency::class,
    ];

    public function taxSettings(): BelongsTo {
        return $this->belongsTo(TaxSetting::class);
    }

    public function taxServices(): HasMany {
        return $this->hasMany(TaxService::class);
    }
}
