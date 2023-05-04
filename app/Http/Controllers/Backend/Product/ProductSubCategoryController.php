<?php

namespace App\Http\Controllers\Backend\Product;

use App\Models\ProductSubCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductSubCategoryRequest;
use App\Http\Requests\UpdateProductSubCategoryRequest;
use App\Models\ProductCategory;
use App\Models\Referee;
use App\Models\User;

class ProductSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ProductCategory::get();
        $sub_categories = ProductSubCategory::with('product_category')->get();
        return view('backend.product.subCategory', compact('categories','sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductSubCategoryRequest $request)
    {
        $sub_category = new ProductSubCategory();
        $sub_category->product_category_id = $request->category_id;
        $sub_category->name = $request->sub_category;
        $sub_category->save();
        return redirect()->back()->with('success','Sub-Category Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductSubCategory $productSubCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductSubCategory $productSubCategory)
    {
        $categories = ProductCategory::get();
        return view('backend.product.editSubCategory', compact('productSubCategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductSubCategoryRequest $request, ProductSubCategory $productSubCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductSubCategory $productSubCategory)
    {
        //
    }
}
