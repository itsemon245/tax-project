<?php

namespace App\Http\Controllers\Backend\Pages;

use App\Models\About;
use App\Models\Section;
use App\Models\AboutSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $row= About::first();
        return view('backend.pages.about',compact('row'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $about = new About();
        $about->description = $request->description;
        $about->save();
        $this->setSections($request, $about, 'About');
        $notification = [
            'message' => 'About us Created',
            'alert-type' => 'success',
        ];
        return redirect()
            ->back()
            ->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        $about->description = $request->description;
        $about->save();
        $this->setSections($request, $about, 'About');
        $notification = [
            'message' => 'About us updated',
            'alert-type' => 'success',
        ];
        return redirect()
            ->back()
            ->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        //
    }
    public function setSections($request, $model, string $modelName)
    {
        if ($request->section_titles) {
            $dir = str($modelName)->slug();
            $dir = str($dir)->plural();
            foreach ($request->section_titles as $key => $title) {
                $image = null;
                $description = $request->section_descriptions[$key];
                $sectionId = $request->section_ids[$key] ?? null;
                $oldSection = $model->sections->find($sectionId);
                $img = $request->section_images[$key] ?? null;
                if ($img !== null && $oldSection !== null) {
                    $image = updateFile($img, $oldSection->image, $dir);
                }
                if ($img === null && $oldSection !== null) {
                    $image = $oldSection->image;
                }
                if ($img !== null && $oldSection === null) {
                    $image = saveImage($img, $dir);
                }
                $section = Section::updateOrCreate(['id' => $sectionId], [
                    'sectionable_type' => $modelName,
                    'sectionable_id' => $model->id,
                    'title'         => $title,
                    'description'   => $description,
                    'image'         => $image
                ]);
            }
        }
    }
}
