<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventTypeRequest;
use App\Models\EventType;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.types.index')->with('types', EventType::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\EventTypeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventTypeRequest $request)
    {
        EventType::create($request->validated());

        return redirect()->route('admin.types.index')->with('success', 'Event Type Created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventType  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(EventType $type)
    {
        return view('admin.types.edit')->with('type', $type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EventTypeRequest  $request
     * @param  \App\Models\EventType  $type
     * @return \Illuminate\Http\Response
     */
    public function update(EventTypeRequest $request, EventType $type)
    {
        $type->update($request->validated());

        return redirect()->route('admin.types.index')->with('success', 'Event Type Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventType  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventType $type)
    {
        try {
            $type->delete();
        } catch (\Throwable $exception) {
            return redirect()->route('admin.types.index')->with('error', $exception->getMessage());
        }

        return redirect()->route('admin.types.index')->with('success', 'Event Type Deleted');
    }
}
