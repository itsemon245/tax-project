<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Purchase extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function purchasable(): MorphTo
    {
        return $this->morphTo();
    }
    public function incomeSource()
    {
        return $this->belongsTo(IncomeSource::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
