@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Teams</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <table>
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
    </div>
@endsection
