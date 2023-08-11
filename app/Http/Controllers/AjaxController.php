<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;

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
    function markNotificationsAsRead(Request $request): Response
    {
        try {
            $user = User::find(auth()->id());
            $user->unreadNotifications->markAsRead();
            $response = [
                'success' => true,
                'message' => "Marked as read",
            ];
        } catch (Exception $e) {
            $response = $e;
        }
        return response($response);
    }
}
