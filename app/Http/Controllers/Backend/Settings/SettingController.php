<?php

namespace App\Http\Controllers\Backend\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Setting::get();
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
        $dataBase = new Setting();
        $dataBase->basic = json_encode($array);
        $dataBase->save(); 
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
        $latest = Setting::latest('created_at')->first()->id;
        $condition = ['id' => $latest];
        $save = Setting::where($condition)->update(['reference' => $array]);
        if($save){
            $notification = [
                'message' => 'Save Changed',
                'alert-type' => 'success',
            ];
            return back()
                ->with($notification);
        }
    }
        /**
     * Store a newly created resource in reference.
     */
    public function payment(Request $request)
    {

        // dd($request);
        $request->validate([
            'payment' => 'required|string',
            'account' => 'required|numeric',
        ]);


        $payments = [];
        foreach($request->payment as $key => $item){
            $array = [
                'payment' => $request->payment[$key],
                'account' => $request->account[$key],
            ];
            array_push($payments, $array);
        }

        // $array = [
        //     'payment' => $request->payment,
        //     'account' => $request->account,
        // ];
        $latest = Setting::latest('created_at')->first()->id;
        $condition = ['id' => $latest];
        $save = Setting::where($condition)->update(['payment' => $payments]);
        if($save){
            $notification = [
                'message' => 'Save Changed',
                'alert-type' => 'success',
            ];
            return back()
                ->with($notification);
        }
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
