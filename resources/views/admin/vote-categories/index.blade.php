@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            @include('admin.nav', ['page' => 'vote-categories'])
            @include('admin.messages')

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Vote Categories
                        <a href="{{ route('admin.vote-categories.create') }}" class="btn btn-primary btn-sm float-right">New</a>
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
                            <?php /** @var \App\VoteCategory $category */ ?>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.vote-categories.edit', $category) }}" class="btn">Edit</a>
                                            <form action="{{ route('admin.vote-categories.destroy', $category) }}" method="post">
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
