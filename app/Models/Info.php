<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_id',
        'title',
        'image_name',
        'image_url',
        'description',
        'status'
    ];
}
