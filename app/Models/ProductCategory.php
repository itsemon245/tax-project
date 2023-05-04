<?php

namespace App\Models;

use App\Models\ProductSubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use HasFactory, SoftDeletes;

    //relationship with productsub category
    public function product_sub_categories()
    {
        return $this->hasMany(ProductSubCategory::class);
    }
}
