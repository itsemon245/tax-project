<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommissionHistory extends Model {
    use HasFactory;
    protected $guarded = [];

    public function parent(): BelongsTo {
        return $this->belongsTo(User::class, 'parent_id');
    }

    public function referee(): BelongsTo {
        return $this->belongsTo(User::class, 'referee_id');
    }
}
