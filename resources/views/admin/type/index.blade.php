@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Event Types
                        <a href="{{ route('admin.types.create') }}" class="btn btn-primary btn-sm float-right">New</a>
                    </div>


                        <table class="table card-body">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php /** @var \App\EventType $type */ ?>
                            @foreach($types as $type)
                                <tr>
                                    <td>{{ $type->id }}</td>
                                    <td>{{ $type->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.types.edit') }}" class="btn">Edit</a>
                                        <a href="{{ route('admin.types.destroy') }}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

            </div>
        </div>
    </div>

@endsection
