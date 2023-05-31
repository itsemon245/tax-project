<?php

namespace App\Http\Controllers\Backend\Book;

use App\Models\Book;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::latest()->get();
        return view('backend.book.view-book', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.book.create-book');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $book_store = new Book();
        $book_store->title = $request->book_title;
        $book_store->author = $request->author;
        $book_store->description = $request->book_desc;
        $book_store->price = $request->price;
        $book_store->thumbail = saveImage($request->book_image, 'book-thumbail', 'book');
        $book_store->sample_pdf = saveImage($request->sample_pdf, 'book-pdf-sample', 'book');
        $book_store->pdf = saveImage($request->pdf, 'book-pdf', 'book');
        $book_store->save();
        $notification = [
            'message' => 'Book Updated',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('backend.book.edit-book', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->title = $request->book_title;
        $book->author = $request->author;
        $book->description = $request->book_desc;
        $book->price = $request->price;
        $book->thumbail = updateFile($request->book_image, $book->thumbail, 'book-thumbail', 'book');
        $book->sample_pdf = updateFile($request->sample_pdf, $book->sample_pdf, 'book-pdf-sample', 'book');
        $book->pdf = updateFile($request->pdf, $book->pdf, 'book-pdf', 'book');
        $book->price = $request->price;
        $book->save();
        $notification = [
            'message' => 'Book Updated',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $thumbail = 'public/' . $book->thumbail;
        if (Storage::exists($thumbail)) {
            Storage::delete($thumbail);
        }
        $sample_pdf = 'public/' . $book->sample_pdf;
        if (Storage::exists($sample_pdf)) {
            Storage::delete($sample_pdf);
        }
        $pdf = 'public/' . $book->pdf;
        if (Storage::exists($pdf)) {
            Storage::delete($pdf);
        }
        $book->delete();
        $notification = [
            'message' => 'Book Deleted',
            'alert-type' => 'success',
        ];
        return back()
            ->with($notification);
    }
}
