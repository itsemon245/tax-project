<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;

    protected $guarded= [];
    protected $casts = [
        'rejected_at'=> 'date',
        'completed_at'=> 'date'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
