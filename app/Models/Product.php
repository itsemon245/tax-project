<?php

namespace App\Models;

use Illuminate\Support\Arr;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    function reviews(): MorphMany
    {
        return $this->morphMany(Review::class, 'reviewable');
    }


    public static function mappedProducts(array $queries): array
    {
        $silverProducts = [];
        $goldProducts = [];
        $platinumProducts = [];
        $exclusiveProducts = [];
        foreach (Product::with('productCategory')->withAvg('reviews', 'rating')->withCount('reviews')->where($queries)->cursor() as $product) {
            switch ($product->type) {
                case 'Silver':
                    $silverProducts[] = $product;
                    break;
                case 'Gold':
                    $goldProducts[] = $product;
                    break;
                case 'Platinum':
                    $platinumProducts[] = $product;
                    break;
                case 'Exclusive':
                    $exclusiveProducts[] = $product;
                    break;

                default:
                    # code...
                    break;
            }
        }

        return array_combine(['Silver', 'Gold', 'Platinum', 'Exclusive'], [$silverProducts, $goldProducts, $platinumProducts, $exclusiveProducts]);
    }


    public function purchase(){
        return $this->morphOne(Purchase::class, 'purchasable');
    }
    public function isPurchased(int $userId = null){
        if ($userId === null) {
            $userId = auth()->id();
        }
        return $this->morphOne(Purchase::class, 'purchasable')->where('user_id', $userId);
    }
}
