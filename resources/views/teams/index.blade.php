@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- Welcome to Larahack --}}
        <div class="jumbotron">
            <h1 class="display-4">Welcome to Larahack</h1>
            <p class="lead">Please choose whether you wish to create a new team, or join a team below.</p>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <a href="{{route('teams.create')}}" class="btn btn-primary btn-block btn-lg">
                        Create a Team
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="#teams" class="btn btn-primary btn-block btn-lg">
                        Join a Team
                    </a>
                </div>
            </div>
        </div>
        {{-- / Welcome to Larahack --}}
    
        
        {{-- Teams User Belongs To --}}
        @if (!$user_teams->isEmpty())
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Your Teams</div>

                    <div class="card-body">
                        @unless ($user_teams->isEmpty())
                        <table class="table">
                            <tr>
                                <th>Team Name</th>
                                <th>Owner</th>
                                <th>Members</th>
                                <th></th>
                            </tr>
                            <?php /** @var \App\Team $team */ ?>
                            @foreach($user_teams as $team)
                                <tr>
                                    <td>{{ $team->name }}</td>
                                    <td>{{ $team->owner->name }}</td>
                                    <td>{{ $team->users_count }}</td>
                                    <td>
                                        @if (!auth()->user()->hasTeam($team->id))
                                        <form action="{{route('team-users.store', $team)}}" method="POST">
                                            @csrf
                                            @method('POST')

                                            <button type="submit" class="btn btn-sm btn-success">Join</button>
                                        </form>
                                        @else
                                        <form action="{{route('team-users.destroy', $team)}}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-link">Leave</button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        @else
                            <p>You have not yet joined any teams.</p>
                        @endunless
                    </div>
                </div>
            </div>
        </div>
        @endif
        {{-- / Teams User Belongs To --}}
        
        {{-- All Teams --}}
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">All Teams</div>

                    <div class="card-body">

                        <table class="table">
                            <tr>
                                <th>Team Name</th>
                                <th>Owner</th>
                                <th>Members</th>
                                <th></th>
                            </tr>
                            <?php /** @var \App\Team $team */ ?>
                            @foreach($teams as $team)
                                <tr>
                                    <td>{{ $team->name }}</td>
                                    <td>{{ $team->owner->name }}</td>
                                    <td>{{ $team->users_count }}</td>
                                    <td>
                                        @if (!auth()->user()->hasTeam($team->id))
                                        <form action="{{route('team-users.update', $team)}}" method="POST">
                                            @csrf
                                            @method('PATCH')

                                            <button type="submit" class="btn btn-sm btn-success">Join</button>
                                        </form>
                                        @else
                                        <form action="{{route('team-users.destroy', $team)}}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-link">Leave</button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- / All Teams --}}

        {{-- Archived Teams --}}
        @if (!$archived_teams->isEmpty())
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card border-danger">
                    <div class="card-header">Archived Teams</div>

                    <div class="card-body">

                        <table class="table">
                            <tr>
                                <th>Team Name</th>
                                <th>Owner</th>
                                <th>Members</th>
                                <th></th>
                            </tr>
                            <?php /** @var \App\Team $team */ ?>
                            @foreach($archived_teams as $team)
                                <tr>
                                    <td>{{ $team->name }}</td>
                                    <td>{{ $team->owner->name }}</td>
                                    <td>{{ $team->users_count }}</td>
                                    <td>
                                        @if (!auth()->user()->hasTeam($team->id))
                                        <form action="{{route('team-users.update', $team)}}" method="POST">
                                            @csrf
                                            @method('PATCH')

                                            <button type="submit" class="btn btn-sm btn-success">Unarchive &amp; Reclaim</button>
                                        </form>
                                        @else
                                        <form action="{{route('team-users.destroy', $team)}}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-link">Leave</button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
        {{-- / Archived Teams --}}

        {{-- Projects --}}
        @if (false)
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">All Projects</div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Team Name</th>
                                <th>Owner</th>
                                <th>Members</th>
                                <th></th>
                            </tr>
                            <?php /** @var \App\Team $team */ ?>
                            @foreach($teams as $team)
                                <tr>
                                    <td>{{ $team->name }}</td>
                                    <td>{{ $team->owner->name }}</td>
                                    <td>{{ $team->users_count }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
        {{-- / Projects --}}
    </div>
@endsection
