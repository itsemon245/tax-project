<?php

namespace App\Http\Controllers;

use App\Models\PromoCode;
use Exception;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use Throwable;

use function Laravel\Prompts\error;
use function PHPUnit\Framework\throwException;

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

    public function applyPromoCode(Request $request): Response
    {
        $content = [
            'data' => null,
            'success' => true,
            'message' => 'Promo code applied!'
        ];
        $code = $request->code;
        $price = $request->price;
        $promoCode = null;
        try {
            $user = User::find(auth()->id());
            $promoCode = $user->promoCodes()->where('code', $code)->firstOrFail();
            $expire = Carbon::parse($promoCode->expired_at);
            $isExpired = today()->gt($expire);
            if ($isExpired) {
                throw new Exception('Promo code expired at ' . $expire->format('d F, Y'));
            }
            if ($promoCode->pivot->limit < 1) {
                throw new Exception('Limit Exceeded');
            }
            // TODO: Calculate promo code discount
            $content['data'] = $promoCode->pivot->limit;
        } catch (Exception $e) {
            $content['data'] = $e;
            $content['success'] = false;
            $content['message'] = $e->getMessage();
            return response($content, 404);
        }
        return response($content);
    }
}
