<?php

namespace App\Http\Controllers\Review;

use App\Models\Review;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Validation\ValidationException;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::orderBy('id', 'DESC')->get();
        return view('backend.review.viewAll', compact('reviews'));
    }

    function itemReview(string $slug, int $id)
    {
        $type = Str::lower($slug);
        switch ($type) {
            case 'product':
                $item = Product::withAvg('reviews', 'rating')
                    ->withCount(reviewsAndStarCounts())
                    ->find($id);
                break;
            case 'service':
                $item = Service::withAvg('reviews', 'rating')
                    ->withCount(reviewsAndStarCounts())
                    ->find($id);
                break;

            default:
                # code...
                break;
        }
        $reviews = $item->reviews()->latest()->get();

        return view('frontend.pages.itemReview', compact('reviews', 'item', 'slug'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $reviews = Review::orderBy('id', 'DESC')->get();
        return view('backend.review.create', compact('reviews'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $slug)
    {

        try {
            $request->validate([
                'rating' => 'required|integer|max:255',
                'comment' => 'required|string',
            ]);
        } catch (ValidationException $exception) {

            return response()->json([
                'errors' => $exception->errors(),
            ], 422);
        }

        if (auth()->user()) {
            $user_id = auth()->id();

            $avatar = $request->image ? $request->image : auth()->user()->image_url;
            $name = $request->name ? $request->name : auth()->user()->name;
            $comment = $request->comment;
            $rating = $request->rating;
            $type = Str::studly($slug);
            $review = Review::create([
                'user_id' => $user_id,
                'name' => $name,
                'avatar' => $avatar,
                'reviewable_type' => $type,
                'reviewable_id' => $request->item_id,
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
    public function destroy($id)
    {
        $review = Review::find($id);
        $review->delete();
        return back();
    }
}
