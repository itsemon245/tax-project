<?php

namespace App\Http\Controllers\Backend\Calendar;

use App\Models\Calendar;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCalendarRequest;
use App\Http\Requests\UpdateCalendarRequest;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Redis;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $calendars= Calendar::latest()->get();
        return view('backend.calendar.view-calendar',compact('calendars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $events = [];
        $calendars = Calendar::latest()->get();
        foreach ($calendars as $calendar) {
            $events[] = [
                'id' => $calendar->id,
                'title' => $calendar->envent_name,
                'start' => $calendar->envent_start_date,
                //'end' => $calendar->event_end_date,
                'weekTextLong' => $calendar->event_description,
            ];
        }
        $events = json_encode($events);
        return view('backend.calendar.create-calendar', ['events' => $events]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCalendarRequest $request)
    {
        $store_calendar = new Calendar();
        $store_calendar->envent_name = $request->event_name;
        $store_calendar->envent_start_date = $request->start_date;
        //$store_calendar->event_end_date = $request->end_date;
        $store_calendar->event_description = $request->event_desc;
        $store_calendar->save();
        $notification = [
            'message' => 'Evnet Created',
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
        return view('backend.calendar.edit-calendar',compact('calendar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCalendarRequest $request, Calendar $calendar)
    {
        $evnet = Calendar::find($calendar->id);
        $evnet->envent_start_date = $request->start_date;
        //$evnet->event_end_date =  $request->end_date;
        $evnet->save();

        $notification = [
            'message' => 'Evnet Updated',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Calendar $calendar)
    {
        //delete appointment data
        $event = Calendar::findOrFail($calendar->id);
        $event->delete();
        return response()->json(['success' => 'event deleled successfully', 'id' => $calendar->id]);
    }
}
