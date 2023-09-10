<?php

namespace App\Models;

use App\Casts\Json;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxCalculator extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'others' => Json::class
    ];
}
