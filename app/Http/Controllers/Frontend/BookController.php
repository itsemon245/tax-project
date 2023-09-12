<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Book;
use App\Models\User;
use App\Models\Review;
use App\Models\PromoCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BookCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('bookCategory')->latest()->paginate(18);
        $bookCategories = BookCategory::get();
        return view('frontend.pages.book.books', compact('books', 'bookCategories'));
    }
    public function show(int $book)
    {
        $book = Book::withAvg('reviews', 'rating')
            ->withCount(reviewsAndStarCounts())
            ->find($book);
        $reviews = $book->reviews;
        return view('frontend.pages.book.viewBook', compact('book', 'reviews'));
    }
}
