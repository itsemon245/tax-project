<?php

namespace App\Traits;

use App\Models\Purchase;

trait IsPurchased {
    public function isPurchased(?int $userId = null) {
        if (null === $userId) {
            $userId = auth()->id();
        }

        return $this->morphMany(Purchase::class, 'purchasable')->where('user_id', $userId)->where('approved', 1);
    }
}
