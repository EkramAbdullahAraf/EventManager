<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
    public function events()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

}
