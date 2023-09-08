<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    function books()
    {
        return $this->hasMany(Book::class);
    }
    function booksWithRatings()
    {
        return $this->books()
            ->withAvg('reviews', 'rating')
            ->withCount('reviews');
    }
}
