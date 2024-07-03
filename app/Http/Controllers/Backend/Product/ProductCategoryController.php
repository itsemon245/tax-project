<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $categories = ProductCategory::with('productSubCategories')->latest()->paginate(paginateCount());

        return view('backend.product.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductCategoryRequest $request) {
        $category = new ProductCategory();
        $category->name = $request->category;
        $category->save();

        return back()->with('success', 'Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductCategory $productCategory) {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategory $productCategory) {
        return view('backend.product.editCategory', compact('productCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductCategoryRequest $request, ProductCategory $productCategory) {
        $productCategory->name = $request->category;
        $productCategory->save();

        return back()->with('success', 'Category Edit Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $productCategory) {
        $productCategory->delete();

        return back()->with('danger', 'Deleted Successfully');
    }
}
