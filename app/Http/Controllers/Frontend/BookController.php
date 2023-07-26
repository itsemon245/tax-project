<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Book;
use App\Models\User;
use App\Models\Review;
use App\Models\PromoCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class BookController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $books = Book::withAvg('reviews', 'rating')->withCount('reviews')->get();
        $users = User::where('id', $user_id)->with('promo_codes')->get();
        return view('frontend.pages.book.books', compact('books', 'users'));
    }
    public function show(int $book)
    {
        $book = Book::withAvg('reviews', 'rating')
        ->withCount(reviewsAndStarCounts())
        ->find($book);
        $reviews = Review::where('book_id', $book->id)->latest()->get();
        return view('frontend.pages.book.viewBook',compact('book', 'reviews'));
    }
}
