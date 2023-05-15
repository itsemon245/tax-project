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

        $doc_types = DocumentType::get();
        return view('backend.userdoc.createDocType', compact('doc_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDocumentTypeRequest $request)
    {
        $document_type = new DocumentType();
        $document_type->doc_type_name = strtolower(Str::slug($request->add_document_type));
        $document_type->save();
        $notification = array(
            'message' => "Added Successfully",
            'alert-type' => 'success',
        );
        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(DocumentType $documentType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // dd($documentType);
        $documentType = DocumentType::findOrFail($id);
        return view('backend.userdoc.editDocType', compact('documentType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDocumentTypeRequest $request, DocumentType $documentType)
    {
        $documentType->doc_type_name = $request->add_document_type;
        $documentType->update();
        $notification = array(
            'message' => "Updated Successfully",
            'alert-type' => 'success',
        );
        return redirect(route('user-doc-type.index'))->with($notification);
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
