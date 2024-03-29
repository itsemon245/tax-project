<?php
namespace App\Traits;

use App\Models\Purchase;

trait IsPurchased
{
    public function isPurchased(int $userId = null)
    {
        if ($userId === null) {
            $userId = auth()->id();
        }
        return $this->morphOne(Purchase::class, 'purchasable')->where('user_id', $userId)->where('approved', 1);
    }
}
