<?php

namespace App\Http\Controllers\Backend\Pages;

use App\Models\About;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;
use App\Models\AboutSection;
use Illuminate\Http\Request;

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
        $row= About::skip(0)->first();
        return view('backend.pages.about',compact('row'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->sections_images);

        $store_about = new About();
        $store_about->description = $request->description;
        
        $sections=[];
        foreach ($request->sections_titles as $key=> $item) {
            $array= [            
                 'title'=>$request->sections_titles[$key],
                 'description'=>$request->sections_descriptions[$key],
                 'image'=> saveImage($request->sections_images[$key], 'about', 'about'),
            ];
             array_push($sections,  $array);
        }
        $store_about->sections = json_encode($sections);
        $store_about->save();
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
        $store_about = About::skip(0)->first();
        $store_about->description = $request->description;
        
        $sections=[];
        foreach ($request->sections_titles as $key=> $item) {
            if(($request->sections_images!= null)){
                $array= [            
                     'title'=>$request->sections_titles[$key],
                     'description'=>$request->sections_descriptions[$key],
                     'image'=> saveImage($request->sections_images[$key], 'about', 'about'),
                ];
            }else{
                $array= [            
                    'title'=>$request->sections_titles[$key],
                    'description'=>$request->sections_descriptions[$key],
               ];
            }
             array_push($sections,  $array);
        }
        $store_about->sections= json_encode($sections);
        $store_about->save();
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
}
