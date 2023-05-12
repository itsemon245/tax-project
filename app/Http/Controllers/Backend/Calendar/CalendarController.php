<?php

namespace App\Http\Controllers\Backend\Calendar;

use App\Models\Calendar;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCalendarRequest;
use App\Http\Requests\UpdateCalendarRequest;
use Carbon\Carbon;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $calendars = Calendar::latest()->get();
        return view('backend.calendar.view-calendar', compact('calendars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $events = Calendar::latest()->get();
        $today = Carbon::now()->format('Y-m-d');
        $currentEvents = Calendar::where('start', 'like', "$today%")->latest()->get();
        return view('backend.calendar.create-calendar', compact('events', 'currentEvents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCalendarRequest $request)
    {
        $event = new Calendar();
        $event->title = $request->event_name;
        $event->start = $request->start_date;
        $event->description = $request->event_description;
        $event->save();
        $notification = [
            'message' => 'Event Created',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }
    /**
     * Display the specified resource.
     */
    public function show(Calendar $calendar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Calendar $calendar)
    {
        return view('backend.calendar.edit-calendar', compact('calendar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCalendarRequest $request, Calendar $calendar)
    {
        $calendar->title = $request->event_name;
        $calendar->start = $request->start_date;
        $calendar->description = $request->event_description;
        $calendar->update();

        $notification = [
            'message' => 'Event Updated',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }

    /**
     * Update the specified resource in storage.
     */
    public function dragUpdate(UpdateCalendarRequest $request, Calendar $calendar)
    {
        $calendar->title = $request->event_name;
        $calendar->start = $request->start_date;
        $calendar->description = $request->event_description;
        $calendar->update();

        $content = [
            'success' => true,
            'message' => 'Event Updated'
        ];
        return response($content);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Calendar $calendar)
    {
        //delete calendar data
        $event = Calendar::findOrFail($calendar->id);
        $event->delete();
        return response()->json(['success' => 'event deleted successfully', 'id' => $calendar->id]);
    }
}
