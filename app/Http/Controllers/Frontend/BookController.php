<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class BookController extends Controller
{
    public function index()
    {
        return view('frontend.pages.book.books');
    }
    public function show(int $book)
    {
        $book = Book::withAvg('reviews', 'rating')
        ->withCount(reviewsAndStarCounts())
        ->find($book);

        // dd($book);
        $reviews = Review::withAvg('reviews', 'rating')->where('book_id', $book->id)->latest()->get();
        return view('frontend.pages.book.viewBook',compact('book', 'reviews'));
    }
}
