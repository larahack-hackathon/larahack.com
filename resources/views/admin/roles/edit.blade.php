@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            @include('admin.nav', ['page' => 'roles'])
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Edit Role
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.roles.update', $role) }}" method="post">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label for="id">ID</label>
                                <input type="text" class="form-control" id="id" name="id" readonly value="{{ $role->id }}">
                            </div>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input role="text" class="form-control" id="name" name="name" value="{{ old('name', $role->name) }}">
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_admin" name="is_admin" @if($role->is_admin) checked value="1" @endif>
                                <label class="form-check-label" for="is_admin">
                                    Is Administrator?
                                </label>
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
