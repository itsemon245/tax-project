<?php

namespace App\Http\Controllers\Frontend;

use App\Models\VideoComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    public function store(Request $request)
    {
        // dd($request->video_id);
        $store = VideoComment::create([
            'user_id' => auth()->user()->id,
            'video_id' => $request->video_id,
            'comment' => $request->comment,
        ]);
        if($store){
            $notification = [
                'message' => 'Discussion Submit',
                'alert-type' => 'success',
            ];
            return back()->with($notification);
        }else{
            $notification = [
                'message' => 'Something Wrong!',
                'alert-type' => 'error',
            ];
            return back()->with($notification);
        }
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
    public function update(Request $request, VideoComment $videoComment)
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
