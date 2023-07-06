<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index()
    {
        return view('frontend.pages.book.books');
    }
    public function show(Book $book)
    {
        return view('frontend.pages.book.viewBook',compact('book'));
    }
}
