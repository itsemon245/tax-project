<?php

namespace App\Http\Controllers;

use App\Models\ExpertProfile;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ExpertController extends Controller {
    public function profile(int $id) {
        $expert = ExpertProfile::withAvg('reviews', 'rating')
            ->withCount(reviewsAndStarCounts())
            ->find($id);
        $reviews = $expert->reviews;
        $user = User::find(auth()->id());
        $canReview = $user ? null !== $user->purchased('ExpertProfile')->find($expert->id) : false;

        return view('frontend.pages.expert.profile', compact('reviews', 'expert', 'canReview'));
    }

    public function browse(Request $request) {
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

        $experts = ExpertProfile::where(function (Builder $q) use ($request) {
            $posts = $request->query('posts');
            $district = $request->query('district');
            $thana = $request->query('thana');
            $dist_only = $request->query('dist_only') == 'false';
            $expTo = $request->query('experience_to');
            $expFrom = $request->query('experience_from');
            if ($posts) {
                $q->whereIn('post', $posts);
            }
            if ($district) {
                $q->where('district', $district);
            }
            if ($thana && $dist_only) {
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
        $district = request()->query('district') ?? ($districts[0] ?? null);
        if ($district) {
            $thanas = ExpertProfile::where('district', $district)->distinct()->latest()->get('thana')->pluck('thana');
        } else {
            $thanas = ExpertProfile::distinct()->latest()->get('thana')->pluck('thana');
        }
        $minExp = ExpertProfile::min('experience');
        $maxExp = ExpertProfile::max('experience');
        $reviews = Review::with('user')
            ->latest()
            ->limit(10)
            ->latest()->get();

        return view('frontend.pages.expert.browse', compact('experts', 'minExp', 'maxExp', 'posts', 'districts', 'thanas', 'reviews'));
    }
}
