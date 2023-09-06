<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Models\ExpertProfile;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Referee;
use App\Models\Video;

class OrderController extends Controller
{
    public function index()
    {
        $payments = Purchase::latest()->get();
        return view('backend.payment.approved', compact('payments'));
    }

    public function consultancyIndex()
    {
        $payments = Purchase::with('purchasable')->where('purchasable_type', 'ExpertProfile')->latest()->get();
        return view('backend.payment.consultancyApproved', compact('payments'));
    }

    public function status($id)
    {
        $payment = Purchase::find($id);
        // dd($payment);
            $user = $payment->user;
            $referee = Referee::with('user')->where('user_id', $user->id)->first();
            // dd();
            $parent = $referee->parent;
            if ($payment->approved === 0) {
                $payment->approved = 1;
                if ($parent) {
                    $commission = $payment->payable_amount * $referee->commission / 100;
                    $parent->total_commission = $parent->total_commission + $commission;
                    $parent->conversion = $parent->conversion + 1;
                    $parent->save();
                    if($payment->purchasable_type === 'Course'){
                        $course = Course::with('videos')->find($payment->purchasable_id);
                        $videos = $course->videos;
                        foreach($videos as $video){
                            $video->users()->attach($user->id);
                        }
                    }
                    
                }
            } else {
                $payment->approved = 0;
            }
        $payment->save();
        $notification = [
            'message' => 'Order Approved Successfully',
            'alert-type' => 'success',
        ];

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
            'message' => 'Order Approved Successfully',
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
        return back()->with($notification);;
    }
}
