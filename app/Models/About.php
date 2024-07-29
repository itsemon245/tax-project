<?php

namespace App\Models;

use App\Traits\HasSections;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model {
    use HasFactory;
    // user defined traits
    use HasSections;
    protected $guarded = [];
}
