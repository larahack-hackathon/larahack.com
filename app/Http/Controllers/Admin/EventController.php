<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\EventType;
use App\Http\Requests\EventRequest;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.events.index')
            ->with('events', Event::with('type')->withCount('entries')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events.create')
            ->with('types', EventType::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\EventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $data = $request->validated();

        Event::create($data);

        return redirect()->route('admin.events.index')->with('success', 'Event Created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('admin.events.edit')
            ->with('types', EventType::all())
            ->with('event', $event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, Event $event)
    {
        $event->update($request->validated());

        return redirect()->route('admin.events.index')->with('success', 'Event Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        try {
            $event->delete();
        } catch (\Throwable $exception) {
            return redirect()->route('admin.events.index')->with('error', $exception->getMessage());
        }

        return redirect()->route('admin.events.index')->with('success', 'Event Deleted');
    }
}
