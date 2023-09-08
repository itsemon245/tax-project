<?php

namespace App\Http\Controllers;

use Exception;
use Throwable;
use Carbon\Carbon;
use App\Models\Slot;
use App\Models\Task;
use App\Models\User;
use App\Models\Section;
use App\Models\PromoCode;
use App\Models\TaxSetting;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\ProductCategory;
use App\Models\CaseStudyPackage;
use Illuminate\Http\JsonResponse;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\error;
use Illuminate\Support\Facades\Storage;
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

    public function applyPromoCode(Request $request): JsonResponse
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
            $promoCode = $user->promoCodes()->where('code', $code)->first();
            if ($promoCode === null) {
                throw new Exception('Invalid promo code!');
            }
            $expire = Carbon::parse($promoCode->expired_at);
            $isExpired = today()->gt($expire);
            if ($isExpired) {
                throw new Exception('Promo code expired at ' . $expire->format('d F, Y') . "!");
            }
            if ($promoCode->pivot->limit < 1) {
                throw new Exception('Limit Exceeded!');
            }
            $discount = $promoCode->is_discount ? $request->price * ($promoCode->amount / 100) : $promoCode->amount;
            $discount = round($discount, 2);
            $payable = $request->price - $discount;
            $content['data'] = [
                'discount' => $discount,
                'payable' => $payable
            ];
        } catch (Exception $e) {
            $content['data'] = $e;
            $content['success'] = false;
            $content['message'] = $e->getMessage();
            return response()->json($content, 404);
        }
        return response()->json($content);
    }

    function caseStudyCategories($id): Response
    {
        $package = CaseStudyPackage::find($id);
        $content = [
            'success' => true,
            'data' => $package->caseStudyCategories
        ];
        return response($content);
    }

    public function getItems($slug): Response
    {
        $table = str($slug)->snake();
        $table = str($table)->plural();
        $items = DB::table($table)->get();

        return response($items);
    }

    public function deleteSection(Section $section)
    {
        deleteFile($section->image);
        $section->delete();
        return response()->json([
            'success' => true,
            'message' => 'Section Deleted!'
        ]);
    }

    function updateTask(int $client, int $task): JsonResponse
    {
        try {
            $task = Task::find($task);
            $task->clients()->updateExistingPivot($client, [
                'is_completed' => !$task->isCompleted($client)
            ]);
            $success = true;
            $message = 'Task Updated!';
        } catch (\Throwable $th) {
            $success = false;
            $message = $th->getMessage();
        }
        return response()->json([
            'success' => $success,
            'message' => $message
        ]);
    }
    function deleteSlot(Slot $slot): JsonResponse
    {
        try {
            $slot->delete();
            $success = true;
            $message = 'Task Updated!';
        } catch (\Throwable $th) {
            $success = false;
            $message = $th->getMessage();
        }
        return response()->json([
            'success' => $success,
            'message' => $message
        ]);
    }


    function getProductSubCategories(ProductCategory $productCategory): JsonResponse
    {
        $subs = $productCategory->productSubCategories()->get(['id', 'name']);
        $success = true;
        return response()->json([
            'data' => $subs,
            'success' => $success,
        ]);
    }

    function toggleVideo($id)
    {
        try {
            $isCompleted = User::find(auth()->id())->toggleVideoStatus($id);
            $success = true;
            $message = $isCompleted ? 'Video marked as completed!': 'Video marked as incomplete!';
        } catch (\Throwable $th) {
            $success = false;
            $message = $th->getMessage();
        }
        return response()->json([
            'success' => $success,
            'message' => $message
        ]);
    }
}
