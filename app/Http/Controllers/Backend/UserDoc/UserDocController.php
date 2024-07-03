<?php

namespace App\Http\Controllers\Backend\UserDoc;

use App\Http\Controllers\Controller;
use App\Models\UserDoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserDocController extends Controller {
    public function __construct() {
        // $this->middleware('can: read document',   [
        //     'only' => ['index', 'show', 'download']
        // ]);
        // $this->middleware('can:update document',   [
        //     'only' => ['index', 'show', 'store', 'create']
        // ]);
        // $this->middleware('can:approve document',   [
        //     'only' => ['index', 'show']
        // ]);
        // $this->middleware('can:delete document',   [
        //     'only' => ['index', 'destroy']
        // ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $userDocs = UserDoc::latest()->where('files', '!=', null)->latest()->paginate(paginateCount());

        return view('backend.userdoc.viewAllDoc', compact('userDocs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $userDocs = UserDoc::with('user')->distinct()->latest()->latest()->get();

        return view('backend.userdoc.createDocName', compact('userDocs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:255',
        ]);
        $userDoc = UserDoc::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
        ]);
        $alert = [
            'alert-type' => 'success',
            'message' => 'New name added',
        ];

        return back()->with($alert);
    }

    public function download(UserDoc $userDoc, $fileIndex) {
        $name = str($userDoc->name)->slug().'-'.$userDoc->user->user_name.'.'.$userDoc->files[$fileIndex]->mimeType;
        $path = 'public/'.$userDoc->files[$fileIndex]->file;
        if (Storage::exists($path)) {
            return Storage::download($path, $name);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(UserDoc $userDoc) {
        return view('backend.userdoc.show', compact('userDoc'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserDoc $userDoc) {
        $userDoc->delete();
        $alert = [
            'alert-type' => 'success',
            'message' => 'Name Deleted',
        ];

        return back()->with($alert);
    }
}
