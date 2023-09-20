<?php

namespace App\Models;

use App\Casts\Json;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'page_cards' => Json::class,
        'page_learn_more' => Json::class,
        'page_topics' => Json::class,
    ];

    function reviews(): MorphMany
    {
        return $this->morphMany(Review::class, 'reviewable');
    }
    function videos()
    {
        return $this->hasMany(Video::class);
    }
    public function purchase()
    {
        return $this->morphOne(Purchase::class, 'purchasable');
    }
    public function isPurchased(int $userId = null)
    {
        if ($userId === null) {
            $userId = auth()->id();
        }
        return $this->morphOne(Purchase::class, 'purchasable')->where('user_id', $userId);
    }

    function exam()
    {
        return $this->hasOne(Exam::class);
    }

    public function price(): Attribute
    {
        $commission = Setting::first(['reference'])->reference->partner_commission;
        $user = User::find(auth()->id());
        return Attribute::make(
            get: fn ($value) => $user?->isPartner() ? $value - ($value * $commission / 100) : $value
        );
    }
}
