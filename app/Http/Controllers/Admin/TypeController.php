<?php

namespace App\Http\Controllers\Admin;

use App\Models\EventType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.types.index')
            ->with('types', EventType::all());
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        EventType::create(['name' => $request->input('name')]);

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
        return view('admin.types.edit')
            ->with('type', $type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EventType  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventType $type)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $type->name = $request->input('name');
        $type->save();

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
