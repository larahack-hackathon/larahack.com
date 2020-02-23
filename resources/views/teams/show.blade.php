@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- Welcome to Larahack --}}
        <div class="jumbotron">
            <h1 class="display-4">{{$team->name}}</h1>
            <p class="lead">Welcome to your Team Page! Here you can see your current projects, and past projects</p>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <a href="{{route('teams.create')}}" class="btn btn-primary btn-block btn-lg">
                        Create a Project
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="#teams" class="btn btn-primary btn-block btn-lg">
                        View Projects
                    </a>
                </div>
            </div>
        </div>
        {{-- / Welcome to Larahack --}}

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
