@extends('layouts.app')

@section('content')
    <h1>Role Details</h1>
    <p><strong>Name:</strong> {{ $role->name }}</p>
    
    <h2>Assign Role to User</h2>
    <form method="POST" action="{{ route('roles.assign', $role) }}">
        @csrf
        <label for="user">Select User:</label>
        <select name="user" id="user">
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        <button type="submit">Assign</button>
    </form>
    
    <h2>Unassign Role from User</h2>
    <form method="POST" action="{{ route('roles.unassign', $role) }}">
        @csrf
        <label for="user">Select User:</label>
        <select name="user" id="user">
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        <button type="submit">Unassign</button>
    </form>
@endsection
