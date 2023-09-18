<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpertCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function expertProfiles()
    {
        return $this->belongsToMany(ExpertProfile::class);
    }
}
