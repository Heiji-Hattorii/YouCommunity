<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\Comment;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count(); 
        $totalEvents = Event::count(); 
        $totalComments = Comment::count(); 
        return view('dashboard', compact('totalUsers', 'totalEvents', 'totalComments'));
    }
}


