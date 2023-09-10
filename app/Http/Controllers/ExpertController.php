<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\ExpertProfile;
use Illuminate\Database\Eloquent\Builder;

class ExpertController extends Controller
{
    public function profile(int $id)
    {
        $expert = ExpertProfile::withAvg('reviews', 'rating')
            ->withCount(reviewsAndStarCounts())
            ->find($id);
        // dd($expert);
        $reviews = Review::where(['reviewable_id' => $expert->id, 'reviewable_type' => 'ExpertProfile'])->latest()->get();
        return view('frontend.pages.expert.profile', compact('reviews', 'expert'));
    }


    public function browse()
    {
        $experts = ExpertProfile::withAvg('reviews', 'rating')->withCount('reviews')->with('expertCategories')->paginate(20);
        $minExp = ExpertProfile::min('experience');
        $maxExp = ExpertProfile::max('experience');
        $minPrice = ExpertProfile::min('price');
        $maxPrice = ExpertProfile::max('price');
        return view('frontend.pages.expert.browse', compact('experts', 'minExp', 'minPrice', 'maxExp', 'maxPrice'));
    }
}
