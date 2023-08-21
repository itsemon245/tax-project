<?php

namespace App\Models;

use App\Casts\Json;
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
    protected $casts = [
        'choices' => Json::class,
    ];

    function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
