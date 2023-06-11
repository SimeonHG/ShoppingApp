@extends('layouts.app')

@section('content')
    <div class="container create-role">
        <h1>Create Role</h1>

        <div class="mt-5 row">
            <div class="col">
                <form method="POST" action="{{ route('roles.store') }}">
                    @csrf
                    <div class="d-flex flex-column">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control role-name_input" id="roleName" name="name" placeholder="name@example.com">
                            <label for="roleName">Role Name</label>
                        </div>
                        
                        <h3>Select Permissions</h3>
                        <div class="btn-group-vertical">
                            @foreach ($permissions as $permission)
                                <div class="pt-2">
                                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}" id="permission_{{ $permission->id }}">
                                    <label for="permission_{{ $permission->id }}">{{ $permission->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-success mt-4">Create</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection