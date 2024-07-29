<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CaseStudyCategory extends Model {
    use HasFactory;

    public function caseStudies(): HasMany {
        return $this->hasMany(CaseStudy::class);
    }

    public function caseStudyPackage(): BelongsTo {
        return $this->belongsTo(CaseStudyPackage::class);
    }
}
