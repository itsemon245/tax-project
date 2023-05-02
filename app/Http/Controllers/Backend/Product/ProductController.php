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
        $products = Product::with('productCategory:id,category')
            ->with('productSubCategory:id,sub_category')
            ->with('user:id,name')
            ->get();
        // dd($products);
        return view('backend.product.viewProducts', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProductCategory::all(['id', 'category']);
        return view('backend.product.addProduct', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        // dd($request->all());
        $request->validated();
        $packageFeature = [];

        foreach ($request->package_feature as $index => $feature) {
            array_push(
                $packageFeature,
                (object)
                [
                    'package_feature' => $feature,
                    'color' => $request->color[$index],
                ]
            );
        }

        Product::create(
            [
                'product_category_id' => $request->category,
                'product_sub_category_id' => $request->sub_category,
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'price' => $request->price,
                'discount' => $request->discount,
                'package_features' => json_encode($packageFeature),
                'ratting' => $request->ratting,
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

    // Get Sub Category According Category
    public function getSubCategories($categoryId)
    {
        $subCategories = ProductSubCategory::where('category_id', $categoryId)->get(['id', 'sub_category']);
        return response()->json($subCategories);
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
        return view('backend.product.editProduct', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
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
}
