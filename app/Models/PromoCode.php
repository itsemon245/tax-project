<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PromoCode extends Model
{
    use HasFactory;
    protected $fillable = ['user_type', 'user_id', 'code', 'limit', 'expired_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
