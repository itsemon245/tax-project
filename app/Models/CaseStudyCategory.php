<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CaseStudyCategory extends Model
{
    use HasFactory;

    function caseStudy(): HasMany
    {
        return $this->hasMany(CaseStudy::class);
    }
}
