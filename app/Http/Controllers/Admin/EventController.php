<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Models\EventType;
use App\Models\VoteCategory;

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
            ->with('types', EventType::all())
            ->with('vote_categories', VoteCategory::all());
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

        $event = Event::create($data);

        $event->vote_categories()->sync($data['vote_category_ids']);

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
            ->with('event', $event)
            ->with('vote_categories', VoteCategory::all());
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

        $event->vote_categories()->sync($request->input('vote_category_ids'));

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
