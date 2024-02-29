<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserDocRequest;
use App\Models\FiscalYear;
use App\Models\UserDoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserDocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $reqYear    = $request->year ? $request->year : currentFiscalYear();
        $fiscalYear = FiscalYear::where('year', $reqYear)->first();
        $userDocs   = [  ];
        if ($fiscalYear) {
            $userDocs = $fiscalYear->userDocs()->where('user_id', auth()->id())->get();
        }
        // $upload_documents = UserDoc::with('user')->get();
        return view('frontend.userdoc.userDoc', compact('userDocs', 'reqYear'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $reqYear = $request->year ? $request->year : currentFiscalYear();
        $names   = UserDoc::distinct()->get()->pluck('name');
        return view('frontend.userdoc.uploadDoc', compact('names', 'reqYear'));
    }

    public function download(UserDoc $userDoc, $fileIndex)
    {
        if (!auth()->user()->hasRole('admin')) {
            if ($userDoc->user_id !== auth()->id()) {
                abort(404, 'File not found');
            }
        }
        $name = str($userDoc->name)->slug() . '-' . $userDoc->user->user_name . '.' . $userDoc->files[ $fileIndex ]->mimeType;
        $path = 'public/' . $userDoc->files[ $fileIndex ]->file;
        if (Storage::exists($path)) {
            return Storage::download($path, $name);
        }
    }
    public function moveTo(Request $request, UserDoc $userDoc)
    {
        $fiscalYear = FiscalYear::firstOrCreate([
            'year' => $request->year,
         ]);
        if ($userDoc->user_id !== auth()->id()) {
            abort(404, 'File not found');
        } else {
            $userDoc->fiscal_year_id = $fiscalYear->id;
            $userDoc->update();
            $alert = [
                'alert-type' => 'success',
                'message'    => 'Document moved to year ' . $request->year,
             ];
            return back()->with($alert);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserDocRequest $request)
    {

        $files  = [  ];
        $images = $request->fileponds;
        // dd($request->fiscal_year);
        foreach ($images as $file) {
            $tempFile = 'temp/' . $file;
            $mainFile = 'public/' . $file;
            $arr      = explode(".", $file);
            $ext      = array_pop($arr);
            if (Storage::exists($tempFile)) {
                Storage::move($tempFile, $mainFile);
                $files[  ] = [
                    'file'     => $file,
                    'mimeType' => $ext,
                 ];
            }
        }
        $year = FiscalYear::firstOrCreate([
            'year' => $request->fiscal_year,
         ]);
        $upload_document                 = new UserDoc();
        $upload_document->user_id        = auth()->id();
        $upload_document->fiscal_year_id = $year->id;
        $upload_document->name           = $request->name;
        $upload_document->files          = $files;
        $upload_document->save();
        $notification = array(
            'message'    => "Submitted Successfully",
            'alert-type' => 'success',
        );
        return back()->with($notification);
    }
    /**
     * Display the specified resource.
     */
    public function show(UserDoc $userDoc)
    {
        return view('frontend.userdoc.show', compact('userDoc'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserDoc $userDoc)
    {
        $userDoc->delete();
        $alert = [
            'alert-type' => 'success',
            'message'    => 'Document Deleted',
         ];
        return back()->with($alert);
    }
}
