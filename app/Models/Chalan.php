<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chalan extends Model {
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'date' => 'date',
    ];

    public function client(): BelongsTo {
        return $this->belongsTo(Client::class);
    }
}
