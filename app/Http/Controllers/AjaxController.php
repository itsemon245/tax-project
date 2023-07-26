<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class AjaxController extends Controller
{
    function toggleStatus(Request $request, $id): Response
    {
        try {
            $table = str($request->table)->snake();
            $record = DB::table($table)->find($id);
            $updated = DB::table($table)->where('id', $id)->update(['status' => !$record->status]);
            $str = str(implode(" ", explode("_", $table)))->title();
            $title = str($str)->singular();
            $response = [
                'success' => true,
                'message' => $title . " status has been updated!",
                'record' => $record
            ];
        } catch (Exception $e) {
            $response = $e;
        }
        return response($response);
    }
}
