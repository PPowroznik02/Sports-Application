<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\User;
use Illuminate\View\View;
use App\Models\Event;
use App\Models\Intrested;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IntrestedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): void
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): void
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Event $event): RedirectResponse
    {
        if ($request->intrested_id != $request->owner_id) {


            $count = Intrested::select('*')
                ->where('intresteds.event_id', $request->event_id)
                ->where('intresteds.intrested_id', $request->intrested_id)
                ->count();
            if ($count == 0) {

                $request->validate([
                    'event_id' => ['required', 'integer'],
                    'intrested_id' => ['required', 'integer'],

                ]);


                $interested = Intrested::create([
                    'event_id' => $request->event_id,
                    'intrested_id' => $request->intrested_id
                ]);

                $interested->save();
            }

        }
        return redirect("/events/" . $request->event_id . '/interested');
    }



    /**
     * Display the specified resource.
     */
    public function show(int $id): View
    {
        $intresteds = User::join('intresteds', 'users.id', '=', 'intresteds.intrested_id')
            ->join('events', 'events.id', '=', 'intresteds.event_id')
            ->where('intresteds.event_id', $id)
            ->select('users.*', 'intresteds.id as intrested_id', 'intresteds.intrested_id as user_id', 'intresteds.event_id as event_id', 'events.owner as owner_id')
            ->get();



        return view('intresteds.show', compact('intresteds'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Intrested $intrested): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Intrested $intrested): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): RedirectResponse
    {
        $test =  Intrested::where('intresteds.id', $id)->first();

        if($test != null) {
            $test->delete();
        }


        return redirect()->back();
    }
}
