<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Requests\TeamRequest;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teams.index')
                ->with('user_teams', auth()->user()->teams()->withCount('users')->get())
                ->with('teams', Team::withCount('users')->get())
                ->with('archived_teams', Team::withTrashed()->where('owner_id', auth()->id())->whereNotNull('deleted_at')->withCount('users')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TeamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
        $team = Team::create([
            'name' => $request->input('name'),
            'owner_id' => $request->user()->id
        ]);
        
        auth()->user()->teams()->attach($team->id);

        return redirect()->route('teams.index')->with('status', 'Team Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
