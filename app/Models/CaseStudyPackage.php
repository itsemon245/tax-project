<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CaseStudyPackage extends Model
{
    use HasFactory;

    function caseStudies(): HasMany
    {
        return $this->hasMany(CaseStudy::class);
    }
    function caseStudyCategories() : HasMany {
        return $this->hasMany(CaseStudyCategory::class);
    }

    /**
     * Interact with the models billing_type
     */
    protected function billingType(): Attribute
    {
        return Attribute::make(
            get: function (string $value) {
                if ($value === 'onetime') {
                    $value = 'lifetime';
                }
                return str($value)->title();
            },
            set: fn (string $value) => strtolower($value),
        );
    }
}
