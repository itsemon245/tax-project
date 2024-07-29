<?php

namespace App\Models;

use App\Casts\Json;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model {
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'basic' => Json::class,
        'reference' => Json::class,
        'payment' => Json::class,
        // 'invoice' => Json::class,
        'return_links' => Json::class,
    ];
}
