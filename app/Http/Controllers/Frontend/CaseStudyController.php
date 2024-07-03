<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use App\Models\CaseStudyCategory;
use App\Models\CaseStudyPackage;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CaseStudyController extends Controller {
    public function caseStudy() {
        $packages = CaseStudyPackage::get();

        return view('frontend.pages.course.case-study.packages', compact('packages'));
    }

    public function index(Request $request, int $package_id) {
        $caseStudyPackage = CaseStudyPackage::find($package_id);
        $caseStudies = $caseStudyPackage->caseStudies()
            ->where(function (Builder $q) use ($request) {
                $minPrice = (int) $request->query('price_from');
                $maxPrice = (int) $request->query('price_to');
                $categories = $request->query('categories');
                if ($minPrice) {
                    $q->where('price', '>=', $minPrice, 'or');
                }
                if ($maxPrice) {
                    $q->where('price', '<=', $maxPrice);
                }
                if ($categories) {
                    $q->whereIn('case_study_category_id', $categories);
                }
            })
            ->latest()->paginate(30);
        $categories = CaseStudyCategory::latest()->latest()->get(['name', 'id']);
        $minPrice = CaseStudy::min('price');
        $maxPrice = CaseStudy::max('price');

        return view('frontend.pages.course.case-study.index', compact('categories', 'caseStudies', 'caseStudyPackage', 'minPrice', 'maxPrice'));
    }

    public function show(CaseStudy $caseStudy) {
        $reviews = $caseStudy->reviews;
        $user = User::find(auth()->id());
        $canReview = $user ? null !== $user->purchased('CaseStudy')->find($caseStudy->id) : false;

        return view('frontend.pages.course.case-study.show', compact('caseStudy', 'reviews', 'canReview'));
    }

    public function download(CaseStudy $caseStudy) {
        $caseStudy->downloads = $caseStudy->downloads + 1;
        $caseStudy->save();

        return Storage::download($caseStudy->download_link, $caseStudy->name);
    }

    public function like(CaseStudy $caseStudy) {
        $caseStudy->likes = $caseStudy->likes + 1;
        $caseStudy->save();

        return back();
    }
}
