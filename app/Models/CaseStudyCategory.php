<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CaseStudyCategory extends Model
{
    use HasFactory;

    function caseStudies(): HasMany
    {
        return $this->hasMany(CaseStudy::class);
    }

    function caseStudyPackage(): BelongsTo
    {
        return $this->belongsTo(CaseStudyPackage::class);
    }
}
