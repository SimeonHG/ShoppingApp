@extends('layouts.app')

@section('content')
    <div class="container edit-user">
            <h1>Edit User</h1>
            <div class="row mt-5">
            <div class="col">
                <form method="POST" action="{{ route('users.update', $user) }}">
                    @csrf
                    @method('PUT')

                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>
                    <div>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                    <div>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('email', $user->email) }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-md-4 col-form-label text-md-right">Bank Accounts:</label>
                    @if ($user->banks->isEmpty())
                        <h4>No products available.</h4>
                    @else
                        <ul class="list-group">
                            @foreach ($user->banks as $bank)
                                <li class="list-group-item d-flex justify-content-between">
                                    {{ $bank->bank_name }} - {{ $bank->bank_account_number }}
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <a class="btn btn-primary mt-3" style="width: 10rem" href="{{ route('users.createBank') }}">Add Bank Account</a>

                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" class="btn btn-success">
                            Update
                        </button>
                    </div>                
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
