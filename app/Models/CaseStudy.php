<?php

namespace App\Models;

use App\Models\CaseStudyCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CaseStudy extends Model
{
    use HasFactory;

    function caseStudyPackage(): BelongsTo
    {
        return $this->belongsTo(CaseStudyPackage::class);
    }

    function caseStudyCategory(): BelongsTo
    {
        return $this->belongsTo(CaseStudyCategory::class);
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


    /**
     * Interact with the models billing_type
     */
    protected function price(): Attribute
    {
        return Attribute::make(
            get: function (int $value) {
                if ($value === 0) {
                    $value = 'Free';
                }
                return $value;
            }
        );
    }
}
