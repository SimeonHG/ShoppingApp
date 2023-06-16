@extends('layouts.app')

@section('content')
    <h1>Add Bank Account</h1>

    <form method="POST" action="{{ route('users.addBank') }}">
        @csrf

        <div class="form-group">
            <label for="bank_name">Bank Name</label>
            <input type="text" name="bank_name" id="bank_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="bank_account_number">Bank Account Number</label>
            <input type="text" name="bank_account_number" id="bank_account_number" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Bank Account</button>
    </form>
@endsection
