<?php

namespace App\Http\Controllers\Backend;

use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CommissionHistory;
use App\Models\Course;
use App\Models\Referee;
use App\Models\UserAppointment;
use App\Notifications\OrderApprovedNotification;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $payments = Purchase::where('approved', $request->status)->with('user')->latest('updated_at')->latest()->paginate(paginateCount());
        return view('backend.payment.approved', compact('payments'));
    }

    public function consultancyIndex()
    {
        $appointments = UserAppointment::with('expertProfile')->whereNot('expert_profile_id', null)->latest()->latest()->get();
        return view('backend.payment.consultancyApproved', compact('appointments'));
    }

    public function status($id)
    {

        $payment = Purchase::find($id);
        $user = $payment->user;
        $referee = Referee::with('user')->where('user_id', $user->id)->first();
        try {
            DB::beginTransaction();
            if ($payment->approved == 0) {
                $payment->approved = 1;
                $payment->approved_at = now();
                $parent = $referee?->parent;
                if ($parent) {
                    $commission = $payment->payable_amount * $referee->commission / 100;
                    $parent->total_commission = $parent->total_commission + $commission;
                    $parent->remaining_commission = $parent->remaining_commission + $commission;
                    $parent->conversion = $parent->conversion + 1;
                    $parent->save();

                    CommissionHistory::create([
                        'parent_id' => $parent->id,
                        'referee_id' => $user->id,
                        'item_name' => $payment->purchasable->name ?? $payment->purchasable->title,
                        'item_price' => $payment->payable_amount,
                        'item_type' => $payment->purchasable_type,
                        'item_id' => $payment->purchasable_id,
                        'trx_id' => $payment->trx_id,
                        'percentage' => (float) $referee->commission,
                        'earning' => $commission
                    ]);
                }
            }
            if ($payment->purchasable_type === 'Course') {
                $course = Course::with('videos')->find($payment->purchasable_id);
                $videos = $course->videos()->with('users')->latest()->get();
                foreach ($videos as $video) {
                    $video->users()->attach($user->id);
                }
            }
            $payment->save();
            DB::commit();
            $notification = [
                'message' => 'Order Approved Successfully',
                'alert-type' => 'success',
            ];
            $user->notify(new OrderApprovedNotification($user));
        } catch (\Throwable $th) {
            DB::rollBack();
            if (config('app.env') == 'local') {
                dd($th);
            }
            $notification = [
                'message' => $th->getMessage(),
                'alert-type' => 'success',
            ];
            //throw $th;
        }

        return redirect()
            ->back()
            ->with($notification);
    }

    public function consultancyStatus($id)
    {
        $payments = Purchase::find($id);
        if ($payments->approved == 0) {
            $payments->approved = 1;
        } else {
            $payments->approved = 0;
        }
        $payments->save();
        $notification = [
            'message' => 'Appointment Approved Successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->back()
            ->with($notification);
    }

    public function destroy($id)
    {
        Purchase::find($id)->delete();
        $notification = [
            'message' => 'Successfully Deleted',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
        ;
    }
}
