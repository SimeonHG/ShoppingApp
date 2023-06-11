@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('roles.store') }}">
        @csrf
        <h2>Create Role</h2>
        <input type="text" name="name" placeholder="Role Name">
        
        <h3>Permissions</h3>
        @foreach ($permissions as $permission)
            <div>
                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" id="permission_{{ $permission->id }}">
                <label for="permission_{{ $permission->id }}">{{ $permission->name }}</label>
            </div>
        @endforeach
        
        <button type="submit">Create</button>
    </form>
@endsection