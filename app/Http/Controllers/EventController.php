<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = Event::orderBy('date_heure', 'asc')->paginate(10);
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('events.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required',
            'lieu' => 'required|string',
            'date_heure' => 'required|date',
            'categorie' => 'required|string',
            'max_participants' => 'required|integer|min:1',
            // 'image_path'=>'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // $imagePath = null;
        // if ($request->hasFile('image_path')) {
        //     // Déplacer l'image dans le dossier public/uploads et obtenir son chemin
        //     $imagePath = $request->file('image_path')->store('uploads', 'public');
        // }

        Event::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'lieu' => $request->lieu,
            'date_heure' => $request->date_heure,
            'categorie' => $request->categorie,
            'user_id' => Auth::id(),
            'max_participants' => $request->max_participants,
            // 'image_path' => $imagePath,         
        ]);

        return redirect()->route('events.index')->with('success', 'Événement créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
        return view('events.show', compact('event'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
        return view('events.edit', compact('event'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required',
            'lieu' => 'required|string',
            'date_heure' => 'required|date',
            'categorie' => 'required|string',
            'max_participants' => 'required|integer|min:1',
            
        ]);

        $event->update($request->all());

        return redirect()->route('events.index')->with('success', 'Événement mis à jour.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Événement supprimé.');
    }
}