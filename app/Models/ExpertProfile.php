<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class ExpertProfile extends Model {
    use HasFactory;
    protected $guarded = [];

    public function owner() {
        return $this->belongsTo(User::class);
    }

    public function maps() {
        return $this->hasMany(Map::class);
    }

    public function reviews(): MorphMany {
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function expertCategories() {
        return $this->belongsToMany(ExpertCategory::class);
    }

    public function appointments() {
        return $this->hasMany(UserAppointment::class, 'expert_profile_id');
    }
}
