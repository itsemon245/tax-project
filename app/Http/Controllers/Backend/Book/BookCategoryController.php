<?php

namespace App\Http\Controllers\Backend\Book;

use App\Models\BookCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookCategoryRequest;
use App\Http\Requests\UpdateBookCategoryRequest;

class BookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = BookCategory::latest()->simplePaginate(paginateCount());
        return view('backend.book.book-category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.book.book-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookCategoryRequest $request)
    {
        $appointmentStore = new BookCategory();
        $appointmentStore->book_category = $request->category_name;
        $appointmentStore->save();
        $notification = [
            'message' => 'Book Category Created',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(BookCategory $bookCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookCategory $bookCategory)
    {
        return view('backend.book.book-category.edit', compact('bookCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookCategoryRequest $request, BookCategory $bookCategory)
    {
        $appointmentStore = BookCategory::find($bookCategory->id);
        $appointmentStore->book_category = $request->category_name;
        $appointmentStore->save();
        $notification = [
            'message' => 'Book Category Updated',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookCategory $bookCategory)
    {
        $bookCategory->delete();
        $notification = [
            'message' => 'Book Category Deleted',
            'alert-type' => 'success',
        ];
        return back()
            ->with($notification);
    }
}
