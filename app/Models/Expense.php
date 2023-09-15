<?php

namespace App\Models;

use App\Casts\Json;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'balance' => 'double',
        'date' => 'date',
        'items' => Json::class
    ];
}
