<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Review extends Model {
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the parent reviewable model.
     */
    public function reviewable(): MorphTo {
        return $this->morphTo();
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
