<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'name',
        'total_marks',
        'passing_marks'
    ];

    function course()
    {
        return $this->belongsTo(Course::class);
    }

    function questions()
    {
        return $this->hasMany(Question::class);
    }

    function users()
    {
        return $this->belongsToMany(User::class);
    }

    function result()
    {
        return $this->hasMany(Result::class);
    }
}
