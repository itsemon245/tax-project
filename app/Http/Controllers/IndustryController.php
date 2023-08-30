<?php

namespace App\Http\Controllers;

use App\Models\Industry;
use App\Models\Section;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $industries = Industry::latest()->get(['id', 'title', 'image', 'intro', 'description']);
        return view('backend.industry.viewAllIndustry', compact('industries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $industries = Industry::get();
        return view('backend.industry.createIndustry', compact('industries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'page_description' => 'required',
            'title' => 'required|max:255',
            'intro' => 'required',
            'image' => 'required|image',
            'description' => 'required',
        ]);

        // Set sections in an array
        $industry = Industry::create([
            ...$validated,
            'image' => saveImage($request->image, 'industries'),
        ]);
        $this->setSections($request, $industry);


        $notification = [
            'message' => 'Industry Created',
            'alert-type' => 'success',
        ];
        return back()
            ->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Industry $industry)
    {
        return view('backend.industry.viewSingle', compact('industry'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Industry $industry)
    {
        //
        return view('backend.industry.edit', compact('industry'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Industry $industry)
    {
        // dd($request->all());
        $validated = $request->validate([
            'page_description' => 'required',
            'title' => 'required|max:255',
            'intro' => 'required',
            'description' => 'required',
        ]);

        $industry->update([
            ...$validated,
            'image' => updateFile($request->image, $industry->image, 'industries'),
        ]);
        $this->setSections($request, $industry);
        $notification = [
            'message' => 'Industry Updated',
            'alert-type' => 'success',
        ];
        return back()
            ->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Industry $industry)
    {
        //
    }
    public function setSections($request, $industry)
    {
        foreach ($request->section_titles as $key => $title) {
            $image = null;
            $description = $request->section_descriptions[$key];
            $sectionId = $request->section_ids[$key] ?? null;
            $oldSection = $industry->sections->find($sectionId);
            $img = $request->section_images[$key] ?? null;
            if ($img !== null && $oldSection !== null) {
                $image = updateFile($img, $oldSection->image, 'industries');
            }
            if ($img === null && $oldSection !== null) {
                $image = $oldSection->image;
            }
            if ($img !== null && $oldSection === null) {
                $image = saveImage($img, 'industries');
            }
            // dd($image);
            $section = Section::updateOrCreate(['id' => $sectionId], [
                'sectionable_type' => 'Industry',
                'sectionable_id' => $industry->id,
                'title'         => $title,
                'description'   => $description,
                'image'         => $image
            ]);
        }
    }
}
