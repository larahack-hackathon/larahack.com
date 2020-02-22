<?php

namespace App\Http\Controllers\Admin;

use App\EventType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        return view('admin.types.index')
            ->with('types', EventType::all());
    }

    public function create()
    {
        return view('admin.types.create');
    }

    public function store( Request $request )
    {
        $request->validate([
            'name' => 'required'
        ]);

        EventType::create(['name' => $request->input('name')]);

        return redirect()->route('admin.types.index')->with('success', 'Event Type Created');
    }

    public function edit( EventType $type )
    {
        return view('admin.types.edit')
            ->with('type', $type);
    }

    public function update( Request $request, EventType $type )
    {
        $request->validate([
            'name' => 'required'
        ]);

        $type->name = $request->input('name');
        $type->save();

        return redirect()->route('admin.types.index')->with('success', 'Event Type Updated');
    }

    public function destroy( EventType $type )
    {
        try{
            $type->delete();
        } catch(\Throwable $exception){
            return redirect()->route('admin.types.index')->with('error', $exception->getMessage());
        }

        return redirect()->route('admin.types.index')->with('success', 'Event Type Deleted');
    }
}
