<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view( 'teams.index' )
            ->with( 'teams', auth()->user()->teams()->withCount('users')->get() );
    }

    public function create()
    {

    }

    public function store( Request $request )
    {

    }

    public function show( Team $team )
    {

    }

    public function edit( Team $team )
    {

    }

    public function update( Request $request, Team $team )
    {

    }

    public function destroy( Team $team )
    {

    }

}
