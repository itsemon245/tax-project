<?php

namespace App\Models;

use App\Traits\HasSections;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Industry extends Model
{
    use HasFactory;
    // user defined traits
    use HasSections;
    protected $guarded = [];
    
}
