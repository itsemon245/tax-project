<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductSubCategory extends Model {
    use HasFactory;

    protected $guarded = [];

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function productCategory(): BelongsTo {
        return $this->belongsTo(ProductCategory::class);
    }
}
