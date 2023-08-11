<?php

namespace App\Http\Controllers\Backend\Product;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('productCategory:id,name')
            ->withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->get();

        return view('backend.product.viewProducts', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->getCategories();
        return view('backend.product.addProduct', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $request->validated();
        $packageFeature = $this->createJsonPackage($request->package_feature, $request->color);

        Product::create(
            [
                'product_category_id' => $request->category,
                'type' => $request->type,
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'price' => $request->price,
                'discount' => $request->discount,
                'package_features' => json_encode($packageFeature),
                'description' => $request->description,
                'is_discount_fixed' => $request->discount_type,
                'is_most_popular' => $request->most_popular,
            ]
        );

        return redirect()
            ->route("product.index")
            ->with(array(
                'message' => "Product Created Successfully",
                'alert-type' => 'success',
            ));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $product = Product::find($product->id);
        $categories = $this->getCategories();
        return view('backend.product.editProduct', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $packageFeature = $this->createJsonPackage($request->package_feature, $request->color);

        Product::find($product->id)
            ->update(
                [
                    'product_category_id' => $request->category,
                    'type' => $request->type,
                    'user_id' => Auth::user()->id,
                    'title' => $request->title,
                    'sub_title' => $request->sub_title,
                    'price' => $request->price,
                    'discount' => $request->discount,
                    'package_features' => json_encode($packageFeature),
                    'description' => $request->description,
                    'is_discount_fixed' => $request->discount_type,
                    'is_most_popular' => $request->most_popular,
                ]
            );

        return redirect()
            ->route("product.index")
            ->with(array(
                'message' => "Product Updated Successfully",
                'alert-type' => 'success',
            ));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Product::find($product->id)->delete();
        return redirect()
            ->back()
            ->with(array(
                'message' => "Product Deleted Successfully",
                'alert-type' => 'success',
            ));
    }

    /**
     * Get Category
     * 
     * @return response\json 
     */
    public function getCategories()
    {
        return ProductCategory::all(['id', 'name']);
    }

    /**
     * Create Package Json FIle
     * 
     * @return array
     */
    public function createJsonPackage($package_features, $colors)
    {
        $packageFeature = [];
        foreach ($package_features as $index => $feature) {
            array_push(
                $packageFeature,
                (object)
                [
                    'package_feature' => $feature,
                    'color' => $colors[$index],
                ]
            );
        }

        return $packageFeature;
    }
}
