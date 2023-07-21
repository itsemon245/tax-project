<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    public function serviceSubCategory()
    {
        return $this->belongsTo(ServiceSubCategory::class);
    }
    public function serviceCategory()
    {
        return $this->belongsTo(ServiceCategory::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function purchased(int $userId = null){
        if ($userId === null) {
            $userId = auth()->id();
        }
        return $this->morphOne(Purchase::class, 'purchasable')->where('user_id', $userId);
    }
}