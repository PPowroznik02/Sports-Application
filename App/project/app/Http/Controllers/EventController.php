<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('events.index')->with('events', Event::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('events.create')->with('events', Event::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
           'name' => ['required', 'string'],
            'type' => ['required','string'],
            'date' => ['required','string'],
            'location' => ['required', 'string'],
            'p_limit' => ['required', 'integer'],
            'owner' => ['required', 'integer'],
        ]);
        $user = get_current_user();

        $event = Event::create([
            'name' => $request -> name,
            'type' => $request -> type,
            'date' => $request -> date,
            'location' => $request -> location,
            'p_limit' => $request -> p_limit,
            'owner' => $request -> owner,


        ]);
        return redirect("/events/".strval($event->id));

    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): View
    {
        return view('events.show')->with('event', Event::where('id', $id)->get()[0]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event): View
    {
        return view('events.edit')->with('event', $event);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string'],
            'type' => ['required', 'string'],
            'date' => ['required', 'string'],
            'location' => ['required', 'string'],
            'p_limit' => ['required', 'integer'],
        ]);

        $event->update([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'date' => $request->input('date'),
            'location' => $request->input('location'),
            'p_limit' => $request->input('p_limit'),
        ]);

        return Redirect::route('events.show', $event);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event): RedirectResponse
    {
        $event->delete();
        return redirect("/events");
        //return view('events.index')->with('events', Event::all());
    }

    public function search(Request $request): View
    {
        // Get the search value from the request
        $search = $request->input('search');
        $search_type = $request->dropdown;

        if ($search_type != "") {

            if (gettype($search_type) == 'string' and gettype($search) == 'string') {
                // Search in the title and body columns from the posts table
                $events = Event::query()
                    ->where($search_type, 'LIKE', "%{$search}%")
                    ->get();
            } else {
                $events = Event::all();
            }
        } else {
            $events = Event::all();
        }
        // Return the search view with the resluts compacted
        return view('events.index', compact('events'));
    }
    public function sort(Request $request): View
    {
        // Get the search value from the request

        $sort_type = $request->sort;
        $sort_style = $request->sort_style;
        if ($sort_type != "") {

            if (gettype($sort_type) == 'string' and gettype($sort_style) == 'string') {

                $events = Event::query()
                    ->orderBy($sort_type, $sort_style)
                    ->get();
            } else {
                $events = Event::all();
            }
        } else {
            $events = Event::all();
        }
        // Return the search view with the resluts compacted
        return view('events.index', compact('events'));
    }


}
