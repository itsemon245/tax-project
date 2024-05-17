<?php

namespace App\Http\Controllers\Backend\Hero;

use App\Models\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::latest()->latest()->paginate(paginateCount());
        return view('backend.hero.view-hero', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return hero view file
        return view('backend.hero.create-hero');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBannerRequest $request)
    {
        // store hero data
        $banner_data = new Banner();
        $banner_data->title = $request->title;
        $banner_data->sub_title = $request->sub_title;
        $banner_data->button = $request->button_link;
        $banner_data->image_url = saveImage($request->hero_image, 'hero', 'hero');
        $banner_data->save();

        $notification = [
            'message' => 'Hero Created',
            'alert-type' => 'success',
        ];
        return redirect()
            ->back()
            ->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        $banner = Banner::where('id', $banner->id)->first();
        return view('backend.hero.edit-hero', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        // update hero data
        $banner_data = Banner::findOrFail($banner->id);
        $banner_data->title = $request->title;
        $banner_data->sub_title = $request->sub_title;
        $banner_data->button = $request->button_link;
        $old_path = $banner_data->image_url;
        $banner_data->image_url = updateFile($request->hero_image, $old_path, 'hero', 'hero');
        $banner_data->save();

        $notification = [
            'message' => 'Hero Updated',
            'alert-type' => 'success',
        ];
        return redirect()
            ->back()
            ->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        //delete banner data
        $hero = Banner::findOrFail($banner->id);
        $path = 'public/' . $hero->image_url;
        if (Storage::exists($path)) {
            Storage::delete($path);
        }
        $hero->delete();
        $notification = [
            'message' => 'Hero Deleted',
            'alert-type' => 'success',
        ];
        return back()
            ->with($notification);
    }
}
