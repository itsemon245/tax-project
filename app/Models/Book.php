<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    /**
     * Get all of the book's reviews.
     */
    function reviews(): MorphMany
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    function bookCategory()
    {
        return $this->belongsTo(BookCategory::class,'book_category_id');
    }

    public function purchase(){
        return $this->morphOne(Purchase::class, 'purchasable');
    }
    public function isPurchased(int $userId = null)
    {
        if ($userId === null) {
            $userId = auth()->id();
        }
        return $this->morphOne(Purchase::class, 'purchasable')->where('user_id', $userId);
    }
}
