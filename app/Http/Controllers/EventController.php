<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\User;
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
        $events = Event::orderBy('date_heure', 'asc')->paginate(9);
        return view('events.index', compact('events'));
    }

    public function myevents()
{
    $events = auth()->user()->events()->orderBy('date_heure', 'asc')->paginate(9);
    return view('events.index', compact('events'));
}

    public function inhome()
    {
        //
        $events = Event::orderBy('date_heure', 'asc')->paginate(9);
        return view('welcome', compact('events'));
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
            'image_path'=>'nullable|image|mimes:jpg,jpeg,png,gif',
        ]);

        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $imageName);
            $imagePath = 'uploads/' . $imageName;
        }

        Event::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'lieu' => $request->lieu,
            'date_heure' => $request->date_heure,
            'categorie' => $request->categorie,
            'user_id' => Auth::id(),
            'max_participants' => $request->max_participants,
            'image_path' => $imagePath,         
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
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        //
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required',
            'lieu' => 'required|string',
            'date_heure' => 'required|date',
            'categorie' => 'required|string',
            'max_participants' => 'required|integer|min:1',
            'image_path'=>'nullable|image|mimes:jpg,jpeg,png,gif',
            
        ]);
        $imagePath = $event->image_path; 
        if ($request->hasFile('image_path')) {
            if (file_exists(public_path($imagePath))) {
                unlink(public_path($imagePath));
            }
    
            $file = $request->file('image_path');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $imageName);
            $imagePath = 'uploads/' . $imageName;
        }
    
        $event->update([
            'titre' => $request->titre,
            'description' => $request->description,
            'lieu' => $request->lieu,
            'date_heure' => $request->date_heure,
            'categorie' => $request->categorie,
            'max_participants' => $request->max_participants,
            'image_path' => $imagePath,
        ]);


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