@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            @include('admin.nav', ['page' => 'events'])
            @include('admin.messages')

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Events
                        <a href="{{ route('admin.events.create') }}" class="btn btn-primary btn-sm float-right">New</a>
                    </div>

                        <table class="table card-body">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Type</th>
                                <th>Name</th>
                                <th>Start At</th>
                                <th>Voting Start At</th>
                                <th>End At</th>
                                <th>Theme</th>
                                <th>Entries</th>
                                <th>Active</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php /** @var \App\Event $event */ ?>
                            @foreach($events as $event)
                                <tr>
                                    <td>{{ $event->id }}</td>
                                    <td>{{ $event->type->name }}</td>
                                    <td>{{ $event->name }}</td>
                                    <td>{{ $event->start_at }}</td>
                                    <td>{{ $event->voting_start_at }}</td>
                                    <td>{{ $event->end_at }}</td>
                                    <td>{{ $event->theme }}</td>
                                    <td>{{ $event->entries_count }}</td>
                                    <td>{{ $event->active }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.events.edit', $event) }}" class="btn">Edit</a>
                                            <form action="{{ route('admin.events.destroy', $event) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
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
