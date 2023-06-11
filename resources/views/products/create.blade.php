@extends('layouts.app')

@section('content')
    <h1>Create Product</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('products.store') }}">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="expiration_date">Expiration Date</label>
            <input type="date" id="expiration_date" name="expiration_date" class="form-control">
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" min="0.00" max="10000.00" step="0.01" name="price" id="price" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="shop_ids">Select Shops</label>
            <select name="shop_ids[]" id="shop_ids" class="form-control" multiple>
                @foreach ($shops as $shop)
                    <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
