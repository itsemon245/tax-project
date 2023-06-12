<?php

namespace App\Http\Controllers\Backend;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Requests\VideoRequest;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditVideoRequest;
use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;

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

        Video::create(
            [
                "title"       => $data['title'],
                "video"       => $data['video'],
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
        Video::find($id)->update([
            "title"       => $validateData['title'],
            "video"       => $validateData['video'],
            "description" => $request->description
        ]);

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

    public function videoUpload(Request $request)
    {
        $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));
        if (!$receiver->isUploaded()) {
            // file not uploaded
        }

        $fileReceived = $receiver->receive(); // receive file
        if ($fileReceived->isFinished()) { // file uploading is complete / all chunks are uploaded
            $file = $fileReceived->getFile(); // get file
            $extension = $file->getClientOriginalExtension();
            $fileName = md5(time()) . '.' . $extension; // a unique file name

            $filePath  = public_path() . '/uploads/videos';
            $file->move($filePath, $fileName);
            $path = URL::asset("/uploads/videos/{$fileName}");

            return [
                'path' => $path,
                'filename' => $fileName
            ];
        }

        // otherwise return percentage informatoin
        $handler = $fileReceived->handler();
        return [
            'done' => $handler->getPercentageDone(),
            'status' => true
        ];
    }
}
