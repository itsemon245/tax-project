<?php

namespace App\Http\Controllers\Frontend\User;

use App\Models\UserDoc;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserDocRequest;
use App\Http\Requests\UpdateUserDocRequest;
use Carbon\Carbon;

class UserDocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $upload_documents = UserDoc::with('user')->get();
        return view('backend.userdoc.viewAllDoc', compact('upload_documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.userdoc.uploadDoc');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserDocRequest $request)
    {
        $images = array();
        $user_id = auth()->id();
        $imageFiles = $request->file('gallery_images');
        $dir = 'user-' . $user_id . '/documents/' . $request->document_type;
        $prefix = Str::slug($request->title);
        if($imageFiles){
            foreach ($imageFiles as $image) {
                $path = saveImage($image, $dir, $prefix);
                array_push($images, $path);
   
            }

        }

        $upload_document = new UserDoc();
        $upload_document->user_id = $user_id;
        $upload_document->document_type = $request->document_type;
        $upload_document->title = $request->title;
        $upload_document->images = json_encode($images);
        $upload_document->save();
        return back();
    }
    /**
     * Display the specified resource.
     */
    public function show(UserDoc $userDoc)
    {
        $document_id = $userDoc->id;
        $upload_documents = UserDoc::with('user')->where('id', $document_id)->get();
        $select_docs = $upload_documents[0];
        return view('backend.userdoc.viewSingleDoc', compact('select_docs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserDoc $userDoc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserDocRequest $request, UserDoc $userDoc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserDoc $userDoc)
    {
        //
    }
}
