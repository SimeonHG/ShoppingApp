@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Roles</h1>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Permissions</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>
                            @foreach ($role->permissions as $permission)
                                <span class="badge bg-primary">{{ $permission->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('roles.show', $role) }}" class="btn btn-primary">View</a>
                            <form method="POST" action="{{ route('roles.destroy', $role) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this role?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <a href="{{ route('roles.create') }}" class="btn btn-success">Create Role</a>
    </div>
@endsection
