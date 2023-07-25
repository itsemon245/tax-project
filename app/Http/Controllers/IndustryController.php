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
        $request->validate([
            'page_description' => 'required|max:500|string',
            'name' => 'required|max:30|string',
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:5000',
            'description' => 'required|max:300|string',
        ]);
        $industry = new Industry();
            $industry->page_description = $request->page_description;
            $industry->name = $request->name;
            $industry->logo = saveImage($request->logo, 'industries', 'industry');
            $industry->description = $request->description;
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
}