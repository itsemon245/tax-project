@extends('frontend.layouts.app')
@section('main')
<div class="row">

    <div class="col-md-6">
                                
        <div class="card">
            <div class="card-body">
                <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Product Images</h5>
    
                <form action="/" method="post" class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews"
                    data-upload-preview-template="#uploadPreviewTemplate">
                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div>
    
                    <div class="dz-message needsclick">
                        <i class="h1 text-muted dripicons-cloud-upload"></i>
                        <h3>Drop files here or click to upload.</h3>
                        <span class="text-muted font-13">(This is just a demo dropzone. Selected files are
                            <strong>not</strong> actually uploaded.)</span>
                    </div>
                </form>
    
                <!-- Preview -->
                <div class="dropzone-previews mt-3" id="file-previews"></div>
            </div>
        </div> <!-- end col-->
    
        <div class="card">
            <div class="card-body">
                <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Meta Data</h5>
    
                <div class="mb-3">
                    <label for="product-meta-title" class="form-label">Meta title</label>
                    <input type="text" class="form-control" id="product-meta-title" placeholder="Enter title">
                </div>
    
                <div class="mb-3">
                    <label for="product-meta-keywords" class="form-label">Meta Keywords</label>
                    <input type="text" class="form-control" id="product-meta-keywords" placeholder="Enter keywords">
                </div>
    
                <div>
                    <label for="product-meta-description" class="form-label">Meta Description </label>
                    <textarea class="form-control" rows="5" id="product-meta-description" placeholder="Please enter description"></textarea>
                </div>
            </div>
        </div> <!-- end card -->
    
    </div> <!-- end col-->

</div>
@endsection
