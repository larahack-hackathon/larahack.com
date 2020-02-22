@extends('layouts.app')

@section('content')

    <div class="container">

        @include('admin.nav', ['page' => 'admin'])

        <div class="row mb-4">
            <div class="col-3">
                <div class="card">
                    <div class="card-header">Users</div>
                    <div class="card-body text-center h2">2,456</div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-header">Users</div>
                    <div class="card-body text-center h2">2,456</div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-header">Users</div>
                    <div class="card-body text-center h2">2,456</div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-header">Users</div>
                    <div class="card-body text-center h2">2,456</div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Admin</div>

                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
