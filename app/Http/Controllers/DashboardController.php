<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
        $events = Event::paginate(10); // Display 10 items per page
        $search = $request->input('search');
        $events = Event::where('title', 'like', '%' . $search . '%')->paginate(10);

    }
    public function events(Request $request)
    {
        $query = auth()->user()->events();

        if ($request->input('search')) {
            $searchTerm = $request->input('search');
            $query->where('title', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('description', 'LIKE', '%' . $searchTerm . '%');
        }

        $events = $query->paginate(10);

        return view('events.index', compact('events'));
    }

    public function show(Event $event)
    {
        $events = Event::paginate(10); // Display 10 items per page

        return view('events.show', compact('event'));
    }

}
