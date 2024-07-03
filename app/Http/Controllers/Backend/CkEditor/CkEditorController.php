<?php

namespace App\Http\Controllers\Backend\CkEditor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CkEditorController extends Controller {
    public function uploadImage(Request $request) {
        $path = saveImage($request->file('upload'), 'ckeditor/products', 'product-image');
        $url = useImage($path);

        return response()->json(['fileName' => 'name', 'uploaded' => 1, 'url' => $url]);
    }
}
