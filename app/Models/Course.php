<?php

namespace App\Models;

use App\Casts\Json;
use App\Traits\HasPurchases;
use App\Traits\IsPurchased;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Course extends Model {
    use HasFactory;
    use IsPurchased;
    use HasPurchases;
    protected $guarded = [];
    protected $casts = [
        'page_cards' => Json::class,
        'page_learn_more' => Json::class,
        'page_topics' => Json::class,
    ];

    public function reviews(): MorphMany {
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function videos() {
        return $this->hasMany(Video::class);
    }

    public function purchase() {
        return $this->morphOne(Purchase::class, 'purchasable');
    }

    public function exam() {
        return $this->hasOne(Exam::class);
    }

    public function price(): Attribute {
        $commission = Setting::first(['reference'])->reference->partner_commission;
        $user = User::find(auth()->id());

        return Attribute::make(
            get: fn ($value) => $user?->isPartner() ? $value - ($value * $commission / 100) : $value
        );
    }
}
