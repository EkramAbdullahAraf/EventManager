<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function edit(Event $event)
    {

        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required|max:255'
        ]);

        $event->update($request->all());

        return redirect()->route('events.index');
    }

    public function index(Request $request)
    {
        $query = Event::query();

        if ($request->input('search')) {
            $searchTerm = $request->input('search');
            $query->where('title', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('description', 'LIKE', '%' . $searchTerm . '%');

        }
        $events = $query->paginate(10);
        if ($request->input('category_id')) {
            $events = Category::find($request->input('category_id'))->events;
        } else {
            $events = Event::all();
        }
        $search = $request->input('search');
        $events = Event::where('title', 'like', '%' . $search . '%')->paginate(10);

        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required|max:255'


        ]);

        $event = new Event($request->all());
        auth()->user()->events()->save($event);
        if ($request->input('categories')) {
            $event->categories()->sync($request->input('categories'));
        }

        return redirect()->route('events.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index');
    }

}
