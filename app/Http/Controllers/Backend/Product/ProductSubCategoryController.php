<?php

namespace App\Http\Controllers\Backend\Product;

use App\Models\ProductSubCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductSubCategoryRequest;
use App\Http\Requests\UpdateProductSubCategoryRequest;
use App\Models\ProductCategory;
use App\Models\Referee;
use App\Models\User;
use App\View\Components\frontend\ProductCard;

class ProductSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subCategories = ProductSubCategory::with('productCategory')->latest()->paginate(paginateCount());
        $categories = ProductCategory::latest()->get(['id', 'name']);
        return view('backend.product.subCategory', compact('subCategories', 'categories'));
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
        $sub_category->product_category_id = $request->category;
        $sub_category->name = $request->sub_category;
        $sub_category->save();
        $notification = [
            'message' => 'Sub-Category Added Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
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
        $categories = ProductCategory::get(['name', 'id']);
        return view('backend.product.editSubCategory', compact('productSubCategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductSubCategoryRequest $request, ProductSubCategory $productSubCategory)
    {
        $productSubCategory->update([
            'product_category_id' => $request->category,
            'name' => $request->sub_category,
        ]);
        $alert = [
            'alert-type' => 'success',
            'message' => 'Updated Successfully!'
        ];
        return back()->with($alert);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductSubCategory $productSubCategory)
    {
        $productSubCategory->delete();
        $alert = [
            'alert-type' => 'success',
            'message' => 'Deleted Successfully!'
        ];
        return back()->with($alert);
    }
}
