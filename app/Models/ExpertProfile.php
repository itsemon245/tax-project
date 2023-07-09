<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpertProfile extends Model
{
    use HasFactory;
    protected $guarded = [];

    function reviews() {
        return $this->hasMany(Review::class);
    }
}
