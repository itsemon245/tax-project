<?php

namespace App\Http\Controllers\Backend\UserDoc;

use Illuminate\Support\Str;
use App\Models\DocumentType;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDocumentTypeRequest;
use App\Http\Requests\UpdateDocumentTypeRequest;

class DocumentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $docTypes = DocumentType::get();
        return view('backend.userdoc.createDocType', compact('docTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDocumentTypeRequest $request)
    {
        $document_type = new DocumentType();
        $document_type->name = strtolower($request->document_type);
        $document_type->save();
        $notification = array(
            'message' => "Added Successfully",
            'alert-type' => 'success',
        );
        return back()->with($notification);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DocumentType $documentType)
    {
        return view('backend.userdoc.editDocType', compact('documentType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DocumentType $documentType, UpdateDocumentTypeRequest $request)
    {
        $documentType->name = str($request->document_type)->lower();
        $documentType->update();
        $notification = array(
            'message' => "Updated Successfully",
            'alert-type' => 'success',
        );
        return redirect(route('document-type.index'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DocumentType $documentType)
    {
        $documentType->delete();
        $notification = array(
            'message' => "Deleted Successfully",
            'alert-type' => 'success',
        );
        return back()->with($notification);
    }
}
