<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamUserController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $teamId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $teamId)
    {
        $team = Team::withTrashed()->find($teamId);

        // If we're reclaiming a team, we need to restore it.
        if (! is_null($team->deleted_at)) {
            $team->restore();
        }

        auth()->user()->teams()->attach($team);

        return redirect()->route('teams.index')->with('status', 'You have joined this team.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $teamId
     * @return \Illuminate\Http\Response
     */
    public function destroy($teamId)
    {
        $team = Team::withTrashed()->find($teamId);

        auth()->user()->teams()->detach($team);

        // If there are no members in the team left, or if the team owner leaves, archive (Soft Delete) it.
        if (($team->users->count() == 0) || ($team->owner_id == auth()->id())) {
            $team->delete();
        }

        return redirect()->route('teams.index')->with('status', 'You have left this team.');
    }
}
