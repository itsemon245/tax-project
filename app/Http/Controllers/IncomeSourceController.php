<?php

namespace App\Http\Controllers;

use App\Models\IncomeSource;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreIncomeSourceRequest;
use App\Http\Requests\UpdateIncomeSourceRequest;

class IncomeSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= IncomeSource::latest()->get();
        return view('backend.incomeSource.incomeSource',compact('data'));
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
    public function store(StoreIncomeSourceRequest $request)
    {
        $storeData = new IncomeSource();
        $storeData->title = $request->title;
        $storeData->image = saveImage($request->image, 'Income-Source', 'income-source');
        $storeData->save();
        $notification = [
            'message' => 'Income Source created',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(IncomeSource $incomeSource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IncomeSource $incomeSource)
    {
    return view('backend.incomeSource.editIncomeSource', compact('incomeSource'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIncomeSourceRequest $request, IncomeSource $incomeSource)
    {
        $updateData = IncomeSource::find($incomeSource->id);
        $updateData->title = $request->title;
        $updateData->image = updateFile($request->image, $incomeSource->image ,'Income-Source', 'income-source');
        $updateData->save();
        $notification = [
            'message' => 'Income Source Updated',
            'alert-type' => 'success',
        ];
        return redirect()->route('income-source.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IncomeSource $incomeSource)
    {
        $oldPath= $incomeSource->image;
        deleteFile($oldPath);
        $incomeSource->delete();
        $notification = [
            'message' => 'Income Source Deleted',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }
}
