<?php

namespace App\Traits;

use App\Models\Purchase;
use Illuminate\Database\Eloquent\Model;

trait HasPurchases {
    public static function bootHasPurchases(): void {
        static::deleting(function (Model $model) {
            $model->purchases()->delete();
        });
    }

    public function purchases() {
        return $this->morphMany(Purchase::class, 'purchasable');
    }
}
