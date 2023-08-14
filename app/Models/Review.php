<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the parent reviewable model.
     */
    public function reviewable(): MorphTo
    {
        return $this->morphTo();
    }
}