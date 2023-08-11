<?php

namespace App\Http\Controllers\Frontend\User;

use Carbon\Carbon;
use App\Models\UserDoc;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreUserDocRequest;
use App\Http\Requests\UpdateUserDocRequest;

class UserDocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $upload_documents = UserDoc::with('user')->get();
        return view('frontend.userdoc.userDoc');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $names = UserDoc::distinct()->get()->pluck('name');
        return view('frontend.userdoc.uploadDoc', compact('names'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserDocRequest $request)
    {

        $files = [];
        $images = $request->fileponds;
        // dd($files);
        foreach ($images as $file) {
            $fileArr = explode('storage/', $file);
            $path = explode('storage/', $file)[1];
            $tempFile = 'temp/' . $path;
            $mainFile = 'public/' . $path;
            $arr = explode(".", $path);
            $ext = array_pop($arr);
            if (Storage::exists($tempFile)) {
                Storage::move($tempFile, $mainFile);
                $files[] = [
                    'file' => $fileArr[0] . "storage/" . $path,
                    'mimeType' => $ext
                ];
            }
        }
        // dd($files);
        $user_id = auth()->id();
        $upload_document = new UserDoc();
        $upload_document->user_id = $user_id;
        $upload_document->name = $request->name;
        $upload_document->files = $files;
        $upload_document->save();
        $notification = array(
            'message' => "Submitted Successfully",
            'alert-type' => 'success',
        );
        return back()->with($notification);
    }
    /**
     * Display the specified resource.
     */
    public function show(UserDoc $userDoc)
    {
        $document_id = $userDoc->id;
        $upload_documents = UserDoc::with('user')->with('documentType')->where('id', $document_id)->get();
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
