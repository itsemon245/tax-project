<?php

namespace App\Models;

use App\Casts\Currency;
use App\Casts\Json;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TaxSetting extends Model {
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'tax_free' => Json::class,
        // 'min_tax' => Currency::class
    ];

    public function slots(): HasMany {
        return $this->hasMany(Slot::class);
    }
}
