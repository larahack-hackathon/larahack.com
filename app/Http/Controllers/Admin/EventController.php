<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\EventType;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return view('admin.events.index')
            ->with('events', Event::with('type')->withCount('entries')->get());
    }

    public function create()
    {
        return view('admin.events.create')
            ->with('types', EventType::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'event_type_id' => ['required', 'exists:'.EventType::class.',id'],
            'name' => ['required', 'string'],
            'start_at' => ['nullable', 'date'],
            'voting_start_at' => ['nullable', 'date'],
            'end_at' => ['nullable', 'date'],
            'theme' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'first_place_prize' => ['nullable', 'string'],
            'second_place_prize' => ['nullable', 'string'],
            'third_place_prize' => ['nullable', 'string'],
            'runner_up_prize' => ['nullable', 'string'],
            'runner_up_amount' => ['nullable', 'integer'],
            'active' => ['required', 'boolean'],
        ]);

        Event::create($data);

        return redirect()->route('admin.events.index')->with('success', 'Event Created');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit')
            ->with('types', EventType::all())
            ->with('event', $event);
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'event_type_id' => ['required', 'exists:'.EventType::class.',id'],
            'name' => ['required', 'string'],
            'start_at' => ['nullable', 'date'],
            'voting_start_at' => ['nullable', 'date'],
            'end_at' => ['nullable', 'date'],
            'theme' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'first_place_prize' => ['nullable', 'string'],
            'second_place_prize' => ['nullable', 'string'],
            'third_place_prize' => ['nullable', 'string'],
            'runner_up_prize' => ['nullable', 'string'],
            'runner_up_amount' => ['nullable', 'integer'],
            'active' => ['required', 'boolean'],
        ]);

        $event->event_type_id = $request->input('event_type_id');
        $event->name = $request->input('name');
        $event->start_at = Carbon::make($request->input('start_at'));
        $event->voting_start_at = Carbon::make($request->input('voting_start_at'));
        $event->end_at = Carbon::make($request->input('end_at'));
        $event->theme = $request->input('theme');
        $event->description = $request->input('description');
        $event->first_place_prize = $request->input('first_place_prize');
        $event->second_place_prize = $request->input('second_place_prize');
        $event->third_place_prize = $request->input('third_place_prize');
        $event->runner_up_prize = $request->input('runner_up_prize');
        $event->runner_up_amount = $request->input('runner_up_amount');
        $event->active = $request->input('active');
        $event->save();

        return redirect()->route('admin.events.index')->with('success', 'Event Updated');
    }

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
