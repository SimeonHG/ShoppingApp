@extends('layouts.app')

@section('content')
    <div class="container show-role">
        <h1>"{{ $role->name }}" Role Details</h1>
        
        <div class="d-flex justify-content-between mt-5 row">
            <div class="d-flex flex-column col">
                <h2>Assign User</h2>
                <form method="POST" action="{{ route('roles.assign', $role) }}">
                    @csrf
                    <label for="user">Select User:</label>
                    <div class="form-floating">
                        <select class="form-select pt-0 pb-0" name="user" id="user">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                     <div class="d-flex justify-content-end">
                        <button class="btn btn-success ms-4 mt-3" type="submit">Assign</button>
                    </div>
                </form>
            </div>
            <div class="col"></div>
            <div class="d-flex flex-column col">
                <h2>Unassign User</h2>
                <form method="POST" action="{{ route('roles.unassign', $role) }}">
                    @csrf
                    <label for="user">Select User:</label>
                    <div class="form-floating">
                        <select class="form-select pt-0 pb-0" name="user" id="user">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-danger ms-4 mt-3" type="submit">Unassign</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
