@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            @include('admin.nav', ['page' => 'types'])
            @include('admin.messages')

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Event Types
                        <a href="{{ route('admin.types.create') }}" class="btn btn-primary btn-sm float-right">New</a>
                    </div>

                        <table class="table card-body">
                            <thead>
                            <tr>
                                <th>ID</th>
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
                                        <a href="{{ route('admin.types.edit', $type) }}" class="btn">Edit</a>
                                        <form action="{{ route('admin.types.destroy', $type) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
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
