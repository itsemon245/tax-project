<?php

namespace App\Models;

use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VideoComment extends Model
{
    use HasFactory;
    public function video(): BelongsTo
    {
        return $this->belongsTo(Video::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
