<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_id',
        'name',
        'mark',
        'choices'
    ];

    function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
