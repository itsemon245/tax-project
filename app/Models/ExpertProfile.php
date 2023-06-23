<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpertProfile extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'post', 'bio', 'image', 'experience', 'join_date', 'availability', 'at_a_glance', 'description'];
}
