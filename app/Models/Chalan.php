<?php

namespace App\Models;

use App\Casts\Currency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chalan extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'date' => 'date',
        'amount' => Currency::class
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
