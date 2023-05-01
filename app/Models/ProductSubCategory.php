<?php

namespace App\Models;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductSubCategory extends Model
{
    use HasFactory;

    // relationship with product category
    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
