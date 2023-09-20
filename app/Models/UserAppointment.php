<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAppointment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function map() {
        return $this->belongsTo(Map::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function expertProfile() {
        return $this->belongsTo(ExpertProfile::class);
    }
}
