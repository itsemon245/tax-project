<?php

namespace App\Http\Controllers\Backend\Appointment;

use App\Models\Appointment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::latest()->get();
        return view('backend.appointment.view-appointment', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.appointment.create-appointment');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppointmentRequest $request)
    {
        $appointmentStore = new Appointment();
        $appointmentStore->title = $request->title;
        $appointmentStore->sub_title = $request->sub_title;
        $appointmentStore->tag = $request->tag;
        $appointmentStore->description = $request->description;
        $appointmentStore->image = saveImage($request->image, 'appointment', 'appointment');
        $appointmentStore->save();
        $notification = [
            'message' => 'Appointment Created',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        return view('backend.appointment.edit-appointment', compact('appointment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        $appointmentUpdate = Appointment::findOrFail($appointment->id);
        $appointmentUpdate->title = $request->title;
        $appointmentUpdate->sub_title = $request->sub_title;
        $appointmentUpdate->tag = $request->tag;
        $appointmentUpdate->description = $request->description;
        $oldImagePath =$appointmentUpdate->image;
        $appointmentUpdate->image = updateFile($request->image, $oldImagePath, 'appointment', 'appointment');
        $appointmentUpdate->save();
        $notification = [
            'message' => 'Appointment Updated',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //delete appointment data
        $appointment = Appointment::findOrFail($appointment->id);
        $path = 'public/' . $appointment->image;
        if (Storage::exists($path)) {
            Storage::delete($path);
        }
        $appointment->delete();
        $notification = [
            'message' => 'Appointment Deleted',
            'alert-type' => 'success',
        ];
        return back()
            ->with($notification);
    }
}
