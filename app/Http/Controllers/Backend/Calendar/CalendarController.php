<?php

namespace App\Http\Controllers\Backend\Calendar;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\Calendar;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCalendarRequest;
use App\Http\Requests\UpdateCalendarRequest;

class CalendarController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $events = Calendar::with('client')->latest()->get();
        $today = Carbon::now()->format('Y-m-d');
        $clients = Client::get();
        $services = Calendar::pluck('service')->unique();
        $currentEvents = Calendar::where('start', 'like', "$today%")->latest()->get();
        return view('backend.calendar.create-calendar', compact('events', 'currentEvents', 'clients', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCalendarRequest $request)
    {
        $event = new Calendar();
        $event->title = $request->event_name;
        $event->client_id = $request->client;
        $event->service = $request->service;
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
     * Update the specified resource in storage.
     */
    public function update(UpdateCalendarRequest $request, Calendar $calendar)
    {
        $calendar->title = $request->event_name;
        $calendar->client_id = $request->client;
        $calendar->service = $request->service;
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
        $calendar->delete();

        $notification = [
            'message' => 'Event Deleted',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }
}
