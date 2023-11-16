<?php
namespace App\Http\Controllers\Frontend;
use App\Models\Industry;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\PartnerSection;
use App\Http\Controllers\Controller;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointmentSections = Appointment::latest()->limit(5)->get();
        $partners = PartnerSection::latest()->limit(10)->get();
        $industries = Industry::get(['id', 'title', 'image', 'intro']);
        return view('frontend.pages.industries.showAllIndustry', compact('industries', 'appointmentSections', 'partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $industry = Industry::find($id);
        $appointmentSections = Appointment::get();
        return view('frontend.pages.industries.show', compact('industry', 'appointmentSections'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
