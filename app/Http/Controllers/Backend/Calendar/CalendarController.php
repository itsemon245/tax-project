<?php

namespace App\Http\Controllers\Backend\Calendar;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\Calendar;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCalendarRequest;
use App\Http\Requests\UpdateCalendarRequest;
use Carbon\CarbonTimeZone;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        $events = Calendar::with('client')->latest()->paginate(paginateCount());
        return view('backend.calendar.viewEvents', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $events = Calendar::with('client')->latest()->get();
        $tz = new CarbonTimeZone('Asia/Dhaka');
        $today = today($tz)->format('Y-m-d');
        $clients = Client::get();
        $services = Calendar::get()->unique();
        $currentEvents = Calendar::where('start', 'like', "$today%")->where('is_completed', false)->latest()->get()->groupBy('type');
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
        $event->type = 'others';
        $event->start = $request->start_date;
        $event->description = $request->event_description;
        $event->save();
        $notification = [
            'message' => 'Event Created',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }

    public function edit(Calendar $calendar)
    {
        $clients = Client::get();
        $services = Calendar::pluck('service')->unique();
        return view('backend.calendar.updateEvent', compact('calendar', 'services', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCalendarRequest $request, Calendar $calendar)
    {
        $calendar->title = $request->event_name;
        $calendar->client_id = $request->client;
        $calendar->service = $request->service === null ? $calendar->service : $request->service;
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

    public function markCompleted(Request $request)
    {
        $message = count($request->ids) > 1 ? 'All Events Completed' : 'Event Completed';
        foreach ($request->ids as $id) {
            // Calendar::find($id)->update([
            //     'is_completed' => true
            // ]);
            Calendar::find($id)->delete();
        }
        $response = [
            'success' => true,
            'message' => $message,
        ];
        return response($response);
    }
}
