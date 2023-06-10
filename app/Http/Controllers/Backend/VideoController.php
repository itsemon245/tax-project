<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditVideoRequest;
use App\Http\Requests\VideoRequest;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::latest()->get();
        return view("backend.video.viewVideo", compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.video.createVideo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VideoRequest $request)
    {
        $data = $request->validated();
        $videoURL  = $this->upload_video($data['video']);

        Video::create(
            [
                "title"       => $data['title'],
                "video"       => $videoURL,
                "description" => $request->description
            ]
        );

        return redirect()
            ->route("video.index")
            ->with(array(
                'message'    => "Video Created Successfully",
                'alert-type' => 'success',
            ));
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
        $video =  Video::find($id);
        return view("backend.video.editVideo", compact('video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditVideoRequest $request, string $id)
    {
        $validateData = $request->validated();
        if (!empty($validateData['video'])) {
            $videoURL  = $this->upload_video($validateData['video']);
            $data = [
                "title"       => $validateData['title'],
                "video"       => $videoURL,
                "description" => $request->description
            ];
        } else {
            $data = [
                "title"       => $validateData['title'],
                "description" => $request->description
            ];
        }

        Video::find($id)->update($data);
        return redirect()
            ->route("video.index")
            ->with(array(
                'message' => "Video Updated Successfully",
                'alert-type' => 'success',
            ));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Video::find($id)->delete();
        return back()->with(array(
            'message'    => "Video Deleted Successfully",
            'alert-type' => 'success',
        ));
    }

    private function upload_video($videoFile)
    {
        $video     = $videoFile;
        $videoName = $video->getClientOriginalName();
        $path      = public_path() . '/uploads/videos';
        $video->move($path, $videoName);
        return URL::asset("/uploads/videos/{$videoName}");
    }
}
