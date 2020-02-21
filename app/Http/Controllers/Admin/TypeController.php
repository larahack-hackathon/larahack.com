<?php

namespace App\Http\Controllers\Admin;

use App\EventType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        return view('admin.type.index')
            ->with('types', EventType::all());
    }

    public function create()
    {
        //
    }

    public function store( Request $request )
    {
        //
    }

    public function show( EventType $type )
    {
        //
    }

    public function edit( EventType $type )
    {
        //
    }

    public function update( Request $request, EventType $type )
    {
        //
    }

    public function destroy( EventType $type )
    {
        //
    }
}
