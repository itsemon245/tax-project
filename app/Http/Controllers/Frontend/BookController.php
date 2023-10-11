<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Book;
use App\Models\User;
use App\Models\Review;
use App\Models\PromoCode;
use App\Models\BookCategory;
use Illuminate\Http\Request;
use App\Models\ExpertProfile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class BookController extends Controller
{
    public function index(Request $request, int $id)
    {

        $bookCategory = BookCategory::find($id, ['name', 'id']);
        $categories = BookCategory::get(['name', 'id']);
        $books = Book::where('book_category_id', $id)
            ->where(function (Builder $q) use ($request) {
                $minPrice = (int)$request->query('price_from');
                $maxPrice = (int)$request->query('price_to');
                $author = $request->query('author');
                $categories = $request->query('categories');
                if ($minPrice) {
                    $q->where('price', '>=', $minPrice);
                }
                if ($maxPrice) {
                    $q->where('price', '<=', $maxPrice);
                }
                if ($author) {
                    $q->where('author', 'like', $author);
                }
                if ($categories) {
                    $q->whereIn('book_category_id', $categories);
                }
            })
            ->withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->paginate(30);
        $reviews = Review::with('user')->latest()->limit(10)->get();
        $authors = Book::distinct()->get('author')->pluck('author');
        $minPrice = Book::min('price');
        $maxPrice = Book::max('price');
        return view('frontend.pages.book.books', compact('bookCategory', 'reviews', 'books', 'authors', 'minPrice', 'maxPrice', 'categories'));
    }
    public function getCategoryBooks(Request $request)
    {
        $bookCategories = BookCategory::get(['name', 'id']);
        $reviews = Review::with('user')->latest()->limit(10)->get();
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
