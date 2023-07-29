<?php

namespace App\Models;

use App\Casts\Json;
use App\Models\DocumentType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserDoc extends Model
{
    use HasFactory;
    protected $casts = [
        'files' => Json::class
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
