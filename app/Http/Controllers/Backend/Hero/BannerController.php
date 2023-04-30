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
        $heros = Banner::latest()->get();
        return view('backend.hero.view-hero', compact('heros'));
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
        $store_data = new Banner();
        $store_data->title = $request->title;
        $store_data->sub_title = $request->sub_title;
        $store_data->button = $request->button_link;
        $store_data->image_url = saveImage($request->hero_image, 'hero', 'hero');
        $store_data->save();

        $notification = [
            'message' => 'Hero Section Data Created',
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
    public function edit(Banner $banner, $id)
    {
        $hero = Banner::where('id', $id)->first();
        return view('backend.hero.edit-hero', compact('hero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBannerRequest $request, Banner $banner, $id)
    {
        // update hero data
        $store_data = Banner::findOrFail($id);
        $store_data->title = $request->title;
        $store_data->sub_title = $request->sub_title;
        $store_data->button = $request->button_link;
        $old_path = $store_data->image_url;
        $store_data->image_url = updateFile($request->hero_image, $old_path, 'hero', 'hero');
        $store_data->save();

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
    public function destroy(Banner $banner, $id)
    {
        //delete banner data
        $hero = Banner::findOrFail($id);
        $path = 'public/' . $hero->image_url;
        if (Storage::exists($path)) {
            Storage::delete($path);
        }
        $hero->delete();
        $notification = [
            'message' => 'Hero Deleted',
            'alert-type' => 'alert',
        ];
        return redirect()
            ->back()
            ->with($notification);
    }
}
