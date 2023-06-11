@extends('layouts.app')

@section('content')
    <div class="container roles">
        <h1>Roles</h1>
        
        <div class="mt-5">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Permissions</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>
                                <div class="d-flex justify-content-left align-middle permissions">
                                    @foreach ($role->permissions as $permission)
                                        <span class="badge rounded-pill bg-info text-dark">{{ $permission->name }}</span>
                                    @endforeach
                                </div
                            </td>
                            <td class="d-flex justify-content-between actions">
                                <a href="{{ route('roles.show', $role) }}" class="btn btn-primary button">View</a>
                                <form method="POST" action="{{ route('roles.destroy', $role) }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger button" onclick="return confirm('Are you sure you want to delete this role?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="footer_buttons">
                <a href="{{ route('roles.create') }}" class="btn btn-success button">Create Role</a>
            </div>
        </div>
    </div>
@endsection
