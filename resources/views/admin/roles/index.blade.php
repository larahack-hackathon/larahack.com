@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            @include('admin.nav', ['page' => 'roles'])
            @include('admin.messages')

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        User Roles
                        <a href="{{ route('admin.roles.create') }}" class="btn btn-primary btn-sm float-right">New</a>
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
                            <?php /** @var \App\Models\Role $role */ ?>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.roles.edit', $role) }}" class="btn">Edit</a>
                                        <form action="{{ route('admin.roles.destroy', $role) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button role="submit" class="btn btn-danger">Delete</button>
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
