<?php

namespace App\Http\Controllers\Backend\Maintenance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Maintenance;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.maintenance.index');
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
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:5000',
            'favicon' => 'required|image|mimes:jpeg,png,jpg|max:1000',
            'title' => 'required|max:500',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:11',
            'whatsapp' => 'required|numeric|digits:11',
            'btn_color' => 'required|max:300|string',
        ]);
        // $data = new Maintenance();
        // $data->logo
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
