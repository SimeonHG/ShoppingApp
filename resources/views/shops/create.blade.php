<!-- shops/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container create-shop">
        <h1 class="mb-5">Create Shop</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col">
                <form method="POST" action="{{ route('shops.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="name">Address</label>
                        <input type="text" name="address" id="address" class="form-control" required>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-success">
                            Create
                        </button>
                    </div>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection