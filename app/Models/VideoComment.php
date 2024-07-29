<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VideoComment extends Model {
    use HasFactory;
    protected $guarded = [];

    public function video(): BelongsTo {
        return $this->belongsTo(Video::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
