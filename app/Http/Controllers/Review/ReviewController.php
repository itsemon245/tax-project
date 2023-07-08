<?php

namespace App\Http\Controllers\Review;

use App\Models\Review;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Http\Resources\ReviewResource;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Validation\ValidationException;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $slug)
    {
        // dd($slug);
        return view('backend.review.index', compact('slug'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $slug)
    {

        try {
            $request->validate([
                'rating' => 'required|integer|max:255',
                'comment' => 'required|string|max:255',
            ]);
        } catch (ValidationException $exception) {

            return response()->json([
                'errors' => $exception->errors(),
            ], 422);
        }

        if (auth()->user()) {
            $user_id = auth()->user()->hasRole('user') ? auth()->id() : null;

            $avatar = $user_id ? auth()->user()->image_url : $request->avatar;
            $name = $user_id ? auth()->user()->name : $request->name;

            $item = Str::snake($slug);
            $comment = $request->comment;
            $rating = $request->rating;
            $review = Review::create([
                'user_id' => $user_id,
                'name' => $name,
                'avatar' => $avatar,
                $item . "_id" => $request->item_id,
                'comment' => $comment,
                'rating' => $rating,
            ]);
            $review = new ReviewResource($review);

            return response()->json([
                'success' => true,
                'data' => $review,
                'message' => 'Review submitted successfully',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'data' => null,
                'message' => 'Login Please!',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        // return response()->json([
        //     'success' => true
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
