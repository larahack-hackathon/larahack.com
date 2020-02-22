@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            @include('admin.nav', ['page' => 'vote-categories'])
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Edit Vote Category
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.vote-categories.update', $category) }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="id">Id</label>
                                <input type="text" class="form-control" id="id" name="id" readonly value="{{ $category->id }}">
                            </div>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
