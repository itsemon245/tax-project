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
        $reviews = Review::where(['reviewable_id' => $expert->id, 'reviewable_type' => 'ExpertProfile'])->latest()->get();
        return view('frontend.pages.expert.profile', compact('reviews', 'expert'));
    }


    public function browse(Request $request)
    {
        $paramMap = [
            'experience_from' => '>=',
            'experience_to' => '<=',
            'categories' => '=',
            'posts' => 'like',
        ];
        $columnMap = [
            'experience_from' => 'experience',
            'experience_to' => 'experience',
            'posts' => 'post',
            'categories' => 'category_id',
        ];

        $queries = [];

        $experts = ExpertProfile::where(function (Builder $q) use ($columnMap, $request, $paramMap) {
            $posts = $request->query('posts');
            $expTo = $request->query('experience_to');
            $expFrom = $request->query('experience_from');
            if ($posts) {
                $q->whereIn('post', $posts);
            }
            if ($expTo) {
                $q->where('experience', '<=', $expTo);
            }
            if ($expFrom) {
                $q->where('experience', '>=', $expFrom);
            }
        })
            ->whereHas('expertCategories', function (Builder $q) use ($request) {
                if ($request->query('categories')) {
                    $q->whereIn('name', $request->query('categories'));
                }
            })
            ->withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->with('expertCategories')
            ->get();
        $posts = ExpertProfile::distinct()->get('post')->pluck('post');
        $minExp = ExpertProfile::min('experience');
        $maxExp = ExpertProfile::max('experience');
        $minPrice = ExpertProfile::min('price');
        $maxPrice = ExpertProfile::max('price');
        return view('frontend.pages.expert.browse', compact('experts', 'minExp', 'minPrice', 'maxExp', 'maxPrice', 'posts'));
    }
}
