<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Video extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    public function course() {
        return $this->belongsTo(Course::class);
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function video_comments(): HasMany {
        return $this->hasMany(VideoComment::class);
    }
}
