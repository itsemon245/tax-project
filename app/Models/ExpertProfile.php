<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExpertProfile extends Model
{
    use HasFactory;
    protected $guarded = [];

    function reviews(): MorphMany
    {
        return $this->morphMany(Review::class, 'reviewable');
    }
    public function expertCategories()
    {
        return $this->belongsToMany(ExpertCategory::class);
    }
}
