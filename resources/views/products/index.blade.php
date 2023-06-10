@extends('layouts.app')

@section('content')
    <h1>Products</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Provider</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($user->products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->provider->name }}</td>
                    <td>
                        <a href="{{ route('products.show', $product) }}" class="btn btn-primary">View</a>
                        @can('manage_products')
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-secondary">Edit</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No products found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @can('manage_products')
        <div>
            <a href="{{ route('products.create') }}" class="btn btn-success">Create Product</a>
        </div>
    @endcan
@endsection
