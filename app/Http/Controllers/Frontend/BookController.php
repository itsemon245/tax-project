<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Review;

class BookController extends Controller
{
    public function index()
    {
        return view('frontend.pages.book.books');
    }
    public function show(Book $book)
    {
        $reviews = Review::where('book_id', $book->id)->latest()->get();
        return view('frontend.pages.book.viewBook',compact('book', 'reviews'));
    }
}
