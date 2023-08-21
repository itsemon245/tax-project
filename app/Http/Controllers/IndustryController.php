<?php

namespace App\Http\Controllers;

use App\Models\Industry;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Industries = Industry::get();
        return view('backend.industry.viewAllIndustry', compact('Industries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Industries = Industry::get();
        return view('backend.industry.createIndustry', compact( 'Industries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'page_description' => 'required|max:500|string',
            'titles' => 'required|max:30|string',
            'images' => 'required|image|mimes:jpeg,png,jpg|max:5000',
            'descriptions' => 'required|max:300|string',
        ]);
        
        $images = $request->file('images');
        $jsonSection = $this->createJsonFile($request->titles, $request->descriptions, $request->images);
        $industry = new Industry();
            $industry->page_description = $request->page_description;
            $industry->title = $request->titles;
            $industry->image = saveImage($images, 'industries', 'industry');
            $industry->description = $request->descriptions;
            $industry->sections = json_encode($jsonSection);
            $industry->save();
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Industry $industry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Industry $industry)
    {
        //
    }

    public function createJsonFile($titles, $descriptions, $images)
    {
        $sections = [];
        foreach ($titles as $index => $title) {
            array_push(
                $sections,
                (object)
                [
                    'title'         => $title,
                    'description'   => $descriptions[$index],
                    'image'         => isset($images[$index]) ? saveImage($images[$index], 'industries', 'industry') : ''
                ]
            );
        }

        return $sections;
    }
}
