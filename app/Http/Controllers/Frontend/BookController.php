<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('frontend.pages.book.books');
    }
    public function show()
    {
        return view('frontend.pages.book.viewBook');
    }
}
