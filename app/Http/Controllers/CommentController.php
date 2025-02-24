<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function store(Request $request, $eventId)
    {
        $request->validate([
            'contenu' => 'required',
        ]);

        $event = Event::findOrFail($eventId);

        $comment = new Comment();
        $comment->contenu = $request->contenu;
        $comment->user_id = Auth::id(); 
        $comment->event_id = $event->id;
        $comment->save();

        return back()->with('success', 'Commentaire ajouté avec succès!');
    }

    public function destroy($commentId)
    {
        $comment = Comment::findOrFail($commentId);

        if ($comment->user_id !== Auth::id()) {
            return back()->with('error', 'Vous ne pouvez pas supprimer ce commentaire.');
        }

        $comment->delete();
        return back()->with('success', 'Commentaire supprimé avec succès!');
    }
    
}
