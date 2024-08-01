<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Participant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Database;
use Illuminate\Support\Facades\DB;
use MongoDB\Driver\Server;

class ParticipantController extends Controller
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
        if ($request->participant_id != $request->owner_id) {

            $count = Participant::select('*')
                ->where('participants.event_id', $request->event_id)
                ->count();
            if ($count < $request->p_limit) {

                $count = Participant::select('*')
                    ->where('participants.event_id', $request->event_id)
                    ->where('participants.participant_id', $request->participant_id)
                    ->count();
                if ($count == 0) {

                    $request->validate([
                        'event_id' => ['required', 'integer'],
                        'participant_id' => ['required', 'integer'],

                    ]);

                    $participant = Participant::create([
                        'event_id' => $request->event_id,
                        'participant_id' => $request->participant_id
                    ]);

                    $participant->save();
                }
            }
        }

        return redirect("/events/" . $request->event_id . "/participants");
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): View
    {

        $participants = User::join('participants', 'users.id', '=', 'participants.participant_id')
            ->join('events', 'events.id', '=', 'participants.event_id')
            ->where('participants.event_id', $id)
            ->select('users.*', 'participants.id as participant_id', 'participants.participant_id as user_id', 'participants.event_id as event_id', 'events.owner as owner_id')
            ->get();



        return view('participants.show', compact('participants'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Participant $participant): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Participant $participant): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Int $id): RedirectResponse
    {
        $test =  Participant::where('participants.id', $id)->first();

        if($test != null) {
            $test->delete();
        }


        return redirect()->back();

    }
}
