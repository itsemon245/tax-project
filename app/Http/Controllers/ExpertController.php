<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\ExpertProfile;

class ExpertController extends Controller
{
    public function profile(int $id)
    {
        $expert = ExpertProfile::withAvg('reviews', 'rating')
            ->withCount(reviewsAndStarCounts())
            ->find($id);
        $reviews = Review::where(['reviewable_id' => $expert->id, 'reviewable_type' => 'ExpertProfile'])->latest()->get();
        return view('frontend.pages.expert.profile', compact('reviews', 'expert'));
    }


    public function browse(Request $request)
    {
        dd('Hello');
        $paramMap = [
            'experience_from' => '<=',
            'experience_to' => '>=',
            'category_id' => '=',
            'post' => 'like',
        ];
        $colunmMap = [
            'experience_from' => 'experience',
            'experience_to' => 'experience',
            'category_id' => 'category_id',
            'post' => 'post',
        ];
        $queries = [];
        dd($request->all());
        // foreach ($request->all() as $key => $value) {
        //     dd($value);
        // }
        $experts = ExpertProfile::withAvg('reviews', 'rating')->withCount('reviews')->with('expertCategories')->get();
        $posts = ExpertProfile::distinct()->get('post')->pluck('post');
        $minExp = ExpertProfile::min('experience');
        $maxExp = ExpertProfile::max('experience');
        $minPrice = ExpertProfile::min('price');
        $maxPrice = ExpertProfile::max('price');
        return view('frontend.pages.expert.browse', compact('experts', 'minExp', 'minPrice', 'maxExp', 'maxPrice', 'posts'));
    }
}
