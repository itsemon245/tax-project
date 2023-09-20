<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    function name(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => str($value)->headline(),
            set: fn (string $value) => str($value)->lower(),
        );
    }
}
