<?php

namespace App\Http\Controllers\Backend\Info;

use App\Models\Info;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInfoRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateInfoRequest;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $infos = Info::latest()->paginate(paginateCount());
        return view('backend.info.viewInfo', compact('infos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageNames = Info::select('page_name')->whereNotNull('page_name')->distinct()->get('page_name')->pluck('page_name');
        return view('backend.info.createInfo', compact('pageNames'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInfoRequest $request)
    {
        $this->titleUpdate($request->title, $request->old_title, $request->section);
        Info::create([
                'section_id'  => $request->section,
                'page_name' => $request->validated('page_name'),
                'title' => $request->title,
                'image_url'   => saveImage($request->info_image, 'info', 'info'),
                'description' => $request->description,
            ]);

        return redirect()
            ->route("info.index")
            ->with(array(
                'message' => "Info Created Successfully",
                'alert-type' => 'success',
            ));
    }

    /**
     * Display the specified resource.
     */
    public function show(Info $info)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Info $info)
    {
        $pageNames = Info::select('page_name')->whereNotNull('page_name')->distinct()->get('page_name')->pluck('page_name');
        return view('backend.info.editInfo', compact('info', 'pageNames'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInfoRequest $request, Info $info)
    {
        $request->validated();
        $this->titleUpdate($request->title, $request->old_title, $request->section);
        $info->update(
                [
                    'section_id'  => $request->section,
                    'title' => $request->title,
                    'description' => $request->description,
                    'status' => $request->status,
                    'page_name' => $request->page_name,

                ]
            );

        if (!empty($request->info_image)) {
            $this->imageDelete($info->image_url);
            $info->update(
                    [
                        'image_url'   => saveImage($request->info_image, 'info', 'info'),
                    ]
                );
        }

        return redirect()
            ->route("info.index")
            ->with(array(
                'message' => "Info Updated Successfully",
                'alert-type' => 'success',
            ));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Info $info)
    {
        $this->imageDelete($info->image_url);
        Info::find($info->id)->delete();
        return back();
    }

    /**
     * Get Section Title
     */
    public function getInfoSectionTitle($sectionId)
    {
        $title = Info::where('section_id', $sectionId)->first('title');
        return response()->json($title->title);
    }

    /**
     * Image Delete
     */
    public function imageDelete($image_url)
    {
        $path = 'public/' . $image_url;
        if (Storage::exists($path)) {
            Storage::delete($path);
        }
        return true;
    }

    /**
     * title update
     */
    public function titleUpdate($newTitle, $oldTitle, $sectionId)
    {
        if ($newTitle != $oldTitle) {
            Info::where('section_id', $sectionId)
                ->update(
                    [
                        'title' => $newTitle
                    ]
                );
        }
        return true;
    }
}
