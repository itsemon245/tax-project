<?php

namespace App\Http\Controllers\Backend\Testimonial;

use App\Models\Testimonial;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::latest()->simplePaginate(paginateCount(20));
        return view('backend.testimonial.view-testimonial', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.testimonial.create-testimonial');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTestimonialRequest $request)
    {
        $testimonialStore = new Testimonial();
        $testimonialStore->name = $request->name;
        $testimonialStore->comment = $request->comment;
        $testimonialStore->avatar = saveImage($request->image, 'testimonial', 'testimonial');
        $testimonialStore->save();
        $notification = [
            'message' => 'Testimonial Created',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('backend.testimonial.edit-testimonial', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial)
    {
        $testimonial->name = $request->name;
        $testimonial->comment = $request->comment;

        $oldImagePath = $testimonial->avatar;
        $testimonial->avatar = updateFile($request->image, $oldImagePath, 'testimonial', 'testimonial');
        $testimonial->save();
        $notification = [
            'message' => 'Testimonial updated',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        $path = 'public/' . $testimonial->image_url;
        if (Storage::exists($path)) {
            Storage::delete($path);
        }
        $testimonial->delete();
        $notification = [
            'message' => 'Testimonial Deleted',
            'alert-type' => 'success',
        ];
        return back()
            ->with($notification);
    }
}
