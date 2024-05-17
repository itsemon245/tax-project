<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $reviews = $expert->reviews;
        $user = User::find(auth()->id());
        $canReview = $user ? $user->purchased('ExpertProfile')->find($expert->id) !== null : false;
        return view('frontend.pages.expert.profile', compact('reviews', 'expert', 'canReview'));
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
            $district = $request->query('district');
            $thana = $request->query('thana');
            $expTo = $request->query('experience_to');
            $expFrom = $request->query('experience_from');
            if ($posts) {
                $q->whereIn('post', $posts);
            }
            if ($district) {
                $q->where('district', $district);
            }
            if ($thana) {
                $q->where('thana', $thana);
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
            ->latest()->paginate(20);
        $posts = ExpertProfile::distinct()->latest()->get('post')->pluck('post');
        $districts = ExpertProfile::distinct()->latest()->get('district')->pluck('district');
        $thanas = ExpertProfile::distinct()->latest()->get('thana')->pluck('thana');
        $minExp = ExpertProfile::min('experience');
        $maxExp = ExpertProfile::max('experience');
        $reviews = Review::with('user')
            ->latest()
            ->limit(10)
            ->latest()->get();
        return view('frontend.pages.expert.browse', compact('experts', 'minExp', 'maxExp',  'posts', 'districts', 'thanas', 'reviews'));
    }
}
