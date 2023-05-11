<?php

namespace App\Http\Controllers\Frontend\User;

use App\Models\UserDoc;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserDocRequest;
use App\Http\Requests\UpdateUserDocRequest;

class UserDocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $upload_documents = UserDoc::with('user')->get();
        $document_images = json_decode($upload_documents[0]->images);
        
       
        return view('backend.userdoc.viewAllDoc', compact('upload_documents', 'document_images'));
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
        if($images = $request->file('gallery_images')){
            foreach ($images as $image) {
                $image_name = $request->document_type . '_' . Str::random();
                $ext = strtolower($image->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $image->storeAs('uploads/user-' . $user_id . '/documents/' . $request->document_type , $image_full_name, 'public');
                $upload_path =  $image->storeAs('uploads/user-' . $user_id . '/documents/' . $request->document_type , $image_full_name, 'public');
                $image_url = $upload_path . $image_full_name;
                $images[] = $image_url;
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
        //
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
