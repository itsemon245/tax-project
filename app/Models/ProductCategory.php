<?php

namespace App\Models;

use App\Models\ProductSubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCategory extends Model
{
    use HasFactory;

    //relationship with productsub category
    public function product_sub_categories()
    {
        return $this->hasMany(ProductSubCategory::class);
    }
}
