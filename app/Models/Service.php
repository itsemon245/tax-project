<?php

namespace App\Models;

use App\Traits\HasPurchases;
use App\Traits\HasSections;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory, HasPurchases;

    // user defined traits
    use HasSections;

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
    function reviews(): MorphMany
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function purchased(int $userId = null)
    {
        if ($userId === null) {
            $userId = auth()->id();
        }
        return $this->morphOne(Purchase::class, 'purchasable')->where('user_id', $userId);
    }

    // accessor
    public function price(): Attribute
    {
        $commission = Setting::first(['reference'])->reference->partner_commission;
        $user = User::find(auth()->id());
        return Attribute::make(
            get: fn ($value) => $user?->isPartner() ? $value - ($value * $commission / 100) : $value
        );
    }
}
