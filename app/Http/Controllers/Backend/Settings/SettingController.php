<?php

namespace App\Http\Controllers\Backend\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;

class SettingController extends Controller
{
    public $setting;
    public function __construct()
    {
       $this->setting = Setting::first();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->setting;
        return view('backend.settings.index', compact('data'));
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
    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'whatsapp' =>'required|numeric',
            'favicon' => 'required|image|mimes:jpeg,png,jpg|max:1024',
        ]);
        $logo = saveImage($request->logo, 'settings', 'logo');
        $favicon = saveImage($request->favicon, 'settings', 'favicon');
        $array = [
            'logo' => $logo,
            'favicon' => $favicon,
            'email' => $request->email,
            'phone' => $request->phone,
            'whatsapp' => $request->whatsapp,
        ];
        if($this->setting){
            $this->setting->basic = $array;
            $this->setting->update(); 
        }else{
            Setting::create([
                'basic' => $array,
            ]);
        }
        $notification = [
            'message' => 'Save Changed',
            'alert-type' => 'success',
        ];
        return back()
            ->with($notification);

    }

        /**
     * Store a newly created resource in reference.
     */
    public function reference(Request $request)
    {

        // dd($request);
        $request->validate([
            'commission' => 'required|numeric',
            'withdrawal' => 'required|numeric',
        ]);
        $array = [
            'commission' => $request->commission,
            'withdrawal' => $request->withdrawal,
        ];
        if($this->setting){
            $this->setting->reference = $array;
        }else{
            Setting::create([
                'reference' => $array,
            ]);
        }
        $notification = [
            'message' => 'Save Changed',
            'alert-type' => 'success',
        ];
        return back()
            ->with($notification);
    }
        /**
     * Store a newly created resource in reference.
     */
    public function payment(Request $request)
    {

        // dd($request);
        $request->validate([
            'payment_methods' => 'required|array',
            'accounts' => 'required|array',
        ]);


        $payments = [];
        foreach($request->payment_methods as $key => $method){
            $array = [
                $method => $request->accounts[$key],
            ];
            array_push($payments, $array);
        }
        if($this->setting){
            $this->setting->update(['payment' => $payments]);
        }else{
            Setting::create([
                'payment' => $payments,
            ]);
        }
        $notification = [
            'message' => 'Save Changed',
            'alert-type' => 'success',
        ];
        return back()
            ->with($notification);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
