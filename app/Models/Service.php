<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'service_category_id',
        'service_sub_category_id',
        'title',
        'intro',
        'description',
        'price',
        'price_description',
        'discount',
        'is_discount_fixed',
        'rating',
        'delivery_date',
        'reviews',
        'sections'
    ];

    public function serviceSubCategory()
    {
        return $this->belongsTo(ServiceSubCategory::class);
    }
    public function serviceCategory()
    {
        return $this->belongsTo(ServiceCategory::class);
    }
}