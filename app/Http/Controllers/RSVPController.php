<?php

namespace App\Http\Controllers;

use App\Models\RSVP;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;


class RSVPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($eventId) {
        $event = Event::findOrFail($eventId);

        if ($event->rsvps()->where('user_id', Auth::id())->exists()) {
            return redirect()->back()->with('error', 'Vous êtes déjà inscrit à cet événement.');
        }

        if ($event->rsvps()->count() >= $event->max_participants) {
            return redirect()->back()->with('error', 'L’événement est complet.');
        }

        RSVP::create([
            'user_id' => Auth::id(),
            'event_id' => $eventId,
        ]);

        return redirect()->back()->with('success', 'Inscription réussie !');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RSVP  $rSVP
     * @return \Illuminate\Http\Response
     */
    public function show(RSVP $rSVP)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RSVP  $rSVP
     * @return \Illuminate\Http\Response
     */
    public function edit(RSVP $rSVP)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RSVP  $rSVP
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RSVP $rSVP)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RSVP  $rSVP
     * @return \Illuminate\Http\Response
     */

     
    public function destroy($eventId) {
        $rsvp = RSVP::where('user_id', Auth::id())->where('event_id', $eventId)->first();

        if (!$rsvp) {
            return redirect()->back()->with('error', 'Vous n’êtes pas inscrit à cet événement.');
        }

        $rsvp->delete();
        return redirect()->back()->with('success', 'Désinscription réussie.');
    }

    }

