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
    public function index(Request $request, int $id)
    {
        $bookCategory = BookCategory::find($id, ['name', 'id']);
        $books = $bookCategory->booksWithRatings()->simplePaginate(30);
        $reviews = \App\Models\Review::with('user')->latest()->limit(10)->get();
        return view('frontend.pages.book.books', compact('bookCategory', 'reviews', 'books'));
    }
    public function getCategoryBooks(Request $request)
    {
        $bookCategories = BookCategory::get(['name', 'id']);
        $reviews = \App\Models\Review::with('user')->latest()->limit(10)->get();
        return view('frontend.pages.book.categoryBooks', compact('bookCategories', 'reviews'));
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
