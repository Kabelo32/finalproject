<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventController extends Controller
{

    public function index()
    {
        // Your logic to display events
        return view('events');
    }
    
    public function store(Request $request)
    {
        // Validate and process the form data
        $validatedData = $request->validate([
            'eventname' => 'required',
            'eventdate' => 'required|date',
            'eventtime' => 'required',
            'eventlocation' => 'required',
            'eventdescription' => 'required',
        ]);

        // Create a new Event instance with the validated data
        $event = new Event($validatedData);

        // Save the Event instance to the database
        $event->save();

        // Optionally, you can flash a success message to the session
        // for displaying it on the redirected page
        $request->session()->flash('success', 'Event recorded successfully.');

        // Redirect to a specific route or view
        return redirect()->route('events');
    }
    public function deleteEvent(Request $request)
    {
        return view('deleteevent');
        // Validate the request
        $request->validate([
            'eventid' => 'required|exists:events,eventid',
        ]);

        // Retrieve event ID from the request
        $eventId = $request->input('eventid');

        try {
            // Delete the event from the database
            DB::table('events')->where('eventid', $eventId)->delete();

            return redirect()->back()->with('success', 'Event deleted successfully!');
            // Redirect to a specific route or view
            return redirect()->route('events');
        } catch (\Exception $e) {
            // Handle any exceptions that may occur during deletion
            return redirect()->back()->with('error', 'Error deleting event: ' . $e->getMessage());
        }
    }

    public function addEvent()
    {
        // Add logic for the 'Add Event' functionality
        return view('addevent'); // Replace with your actual view name
    }
    

    public function updateEvent(Request $request)
{
    return view('updateevent');
    // Validate the request data
    $request->validate([
        'eventid' => 'required|exists:events,eventid',
        'eventname' => 'required',
        'eventdate' => 'required|date',
        'eventtime' => 'required',
        'eventlocation' => 'required',
        'eventdescription' => 'required',
    ]);

    // Retrieve form data
    $eventId = $request->input('eventid');
    $eventName = $request->input('eventname');
    $eventDate = $request->input('eventdate');
    $eventTime = $request->input('eventtime');
    $eventLocation = $request->input('eventlocation');
    $eventDescription = $request->input('eventdescription');

    // Check if the event with the specified ID exists
    $existingEvent = Event::find($eventId);

    if (!$existingEvent) {
        return redirect()->back()->with('error', 'Event with ID ' . $eventId . ' not found.');
    }

    // Update Event in the database
    $existingEvent->update([
        'eventname' => $eventName,
        'eventdate' => $eventDate,
        'eventtime' => $eventTime,
        'eventlocation' => $eventLocation,
        'eventdescription' => $eventDescription,
    ]);

    return redirect()->back()->with('success', 'Event updated successfully!');
}




    
}
