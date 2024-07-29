<?php

namespace App\Models;

use App\Traits\HasPurchases;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CaseStudy extends Model {
    use HasFactory;
    use HasPurchases;

    public function caseStudyPackage(): BelongsTo {
        return $this->belongsTo(CaseStudyPackage::class);
    }

    public function caseStudyCategory(): BelongsTo {
        return $this->belongsTo(CaseStudyCategory::class);
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
            get: function ($value) use ($commission, $user) {
                if ($value > 0) {
                    $value = $user?->isPartner() ? $value - ($value * $commission / 100) : $value;
                } else {
                    $value = 'Free';
                }

                return $value;
            }
        );
    }
}
