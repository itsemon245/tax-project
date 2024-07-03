<?php

namespace App\Models;

use App\Casts\Json;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDoc extends Model {
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'files' => Json::class,
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function fiscalYear() {
        return $this->belongsTo(FiscalYear::class);
    }
}
