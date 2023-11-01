<?php

namespace App\Http\Controllers;

use App\Models\VideoComment;
use App\Http\Requests\StoreVideoCommentRequest;
use App\Http\Requests\UpdateVideoCommentRequest;

class VideoCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreVideoCommentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(VideoComment $videoComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VideoComment $videoComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVideoCommentRequest $request, VideoComment $videoComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VideoComment $videoComment)
    {
        //
    }
}
