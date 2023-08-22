<?php

namespace App\Http\Controllers\Frontend\User;

use Carbon\Carbon;
use App\Models\UserDoc;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreUserDocRequest;
use App\Http\Requests\UpdateUserDocRequest;
use App\Models\FiscalYear;
use Illuminate\Http\Request;

class UserDocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $reqYear = $request->year ? $request->year : currentFiscalYear();
        $fiscalYear = FiscalYear::where('year', $reqYear)->first();
        $userDocs = $fiscalYear ? $fiscalYear->userDocs : [];
        // $upload_documents = UserDoc::with('user')->get();
        return view('frontend.userdoc.userDoc', compact('userDocs', 'reqYear'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $reqYear = $request->year ? $request->year : currentFiscalYear();
        $names = UserDoc::distinct()->get()->pluck('name');
        return view('frontend.userdoc.uploadDoc', compact('names', 'reqYear'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserDocRequest $request)
    {

        $files = [];
        $images = $request->fileponds;
        // dd($request->fiscal_year);   
        foreach ($images as $file) {
            $tempFile = 'temp/' . $file;
            $mainFile = 'public/' . $file;
            $arr = explode(".", $file);
            $ext = array_pop($arr);
            if (Storage::exists($tempFile)) {
                Storage::move($tempFile, $mainFile);
                $files[] = [
                    'file' => $file,
                    'mimeType' => $ext
                ];
            }
        }
        $year = FiscalYear::firstOrCreate([
            'year' => $request->fiscal_year
        ]);
        $upload_document = new UserDoc();
        $upload_document->user_id = auth()->id();
        $upload_document->fiscal_year_id = $year->id;
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
