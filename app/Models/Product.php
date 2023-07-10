<?php

namespace App\Models;

use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'sub_title',
        'price',
        'discount',
        'package_features',
        'ratting',
        'reviews',
        'description',
        'is_discount_fixed',
        'is_most_popular',
        'status',
        'product_category_id',
        'product_sub_category_id',
        'user_id',
    ];

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
