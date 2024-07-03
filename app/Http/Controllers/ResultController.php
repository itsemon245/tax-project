<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResultRequest;
use App\Http\Requests\UpdateResultRequest;
use App\Models\Result;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $result = Result::with('exam', 'user')->where('user_id', Auth::user()->id)->latest()->latest()->paginate(paginateCount());

        // dd($result);
        return view('backend.result.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResultRequest $request) {
    }

    /**
     * Display the specified resource.
     */
    public function show(Result $result) {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Result $result) {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResultRequest $request, Result $result) {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Result $result) {
    }
}
