<?php

namespace App\Models;

use App\Traits\HasPurchases;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Book extends Model {
    use HasFactory;
    use HasPurchases;

    /**
     * Get all of the book's reviews.
     */
    public function reviews(): MorphMany {
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function bookCategory() {
        return $this->belongsTo(BookCategory::class, 'book_category_id');
    }

    public function purchase() {
        return $this->morphOne(Purchase::class, 'purchasable');
    }

    public function isPurchased(?int $userId = null) {
        if (null === $userId) {
            $userId = auth()->id();
        }

        return $this->morphOne(Purchase::class, 'purchasable')->where('user_id', $userId);
    }

    public function price(): Attribute {
        $commission = Setting::first(['reference'])->reference->partner_commission;
        $user = User::find(auth()->id());

        return Attribute::make(
            get: fn ($value) => $user?->isPartner() ? $value - ($value * $commission / 100) : $value
        );
    }
}
