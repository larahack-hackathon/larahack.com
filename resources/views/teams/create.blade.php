@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create A Team</div>
                    <div class="card-body">
                        <form action="{{route('teams.store')}}" method="POST" role="form">
                            @csrf

                            <div class="form-group">
                                <label for="name">Team Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Team Name">
                            </div>
                        
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
