<?php

namespace App\Models;

use App\Casts\Json;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'page_cards' => Json::class,
        'page_learn_more' => Json::class,
        'page_topics' => Json::class,
    ];

    function videos()
    {
        return $this->hasMany(Video::class);
    }
    public function purchase()
    {
        return $this->morphOne(Purchase::class, 'purchasable');
    }
    public function isPurchased(int $userId = null)
    {
        if ($userId === null) {
            $userId = auth()->id();
        }
        return $this->morphOne(Purchase::class, 'purchasable')->where('user_id', $userId);
    }

    function exams()
    {
        return $this->hasMany(Exam::class);
    }
}
