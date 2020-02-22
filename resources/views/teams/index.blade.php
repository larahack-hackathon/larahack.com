@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to Larahack</h1>
            <p class="lead">Please choose whether you wish to create a new team, or join a team below.</p>
        </div>
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
        
        <br>

        <div class="row" id="teams">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">All Teams</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

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
                                            <a href="" class="btn btn-sm btn-success">Join</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                    </div>
                </div>
            </div>
        </div>
        <br>
        @if (false)
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">All Projects</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

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
    </div>
@endsection
