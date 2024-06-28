<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;

class BulkDeleteController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'bulk_delete_from' => ['required', 'date'],
            'bulk_delete_to' => ['required', 'date'],
            'table' => ['required', 'string'],
        ]);
        $dates = [
            Carbon::parse($request->bulk_delete_from)->toDateTimeString(),
            Carbon::parse($request->bulk_delete_to)->toDateTimeString(),
        ];
        try {
            DB::table($request->table)->where(function (Builder $builder) use ($dates) {
                $builder->whereBetween('created_at', $dates);
            })->delete();
            $notification = [
                'alert-type' => 'success',
                'message' => 'Bulk delete successful!'
            ];
        } catch (\Throwable $th) {
            $notification = [
                'alert-type' => 'error',
                'message' => 'Something went wrong!'
            ];
        }


        return back()->with($notification);

    }
}
