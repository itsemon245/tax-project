<?php

namespace App\Models;

use App\Casts\Json;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentTime extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'times'=> Json::class
    ];
}
