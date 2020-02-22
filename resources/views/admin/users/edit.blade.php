@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            @include('admin.nav', ['page' => 'users'])
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Edit user
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.users.update', $user) }}" method="post">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label for="id">ID</label>
                                <input type="text" class="form-control" id="id" name="id" readonly value="{{ $user->id }}">
                            </div>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input user="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input user="text" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>
                    </div>
                </div>

                <br>

                <div class="card">
                    <div class="card-header">
                        Manage User Roles
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.user-roles.update', $user) }}" method="post">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <select name="role_ids[]" id="role_ids[]" class="form-control" required="required" multiple>
                                    @foreach ($roles as $role)
                                        <option value="{{$role->id}}" @if (in_array($role->id, $user->roles->pluck('id')->toArray())) selected @endif>{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
    $(document).on('change','#is_admin',function(){
        if($(this).is(':checked')){
           $('#is_admin').val(1);
        }else{
           $('#is_admin').val(0);
        }
    });
</script>
@endpush
