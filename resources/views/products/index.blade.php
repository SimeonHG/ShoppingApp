@extends('layouts.app')

@section('content')
    <div class="container products">
        <h1>Products</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="mt-5">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Provider</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($user->products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>${{ $product->price }}</td>
                            <td>{{ $product->provider->name }}</td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('products.show', $product) }}" class="btn btn-primary button">View</a>
                                    @can('manage_products')
                                        <a href="{{ route('products.edit', $product) }}" class="btn btn-secondary button">Edit</a>
                                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger button">Delete</button>
                                        </form>
                                    @endcan
                                </div>
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
                <div class="footer_buttons">
                    <a href="{{ route('products.create') }}" class="btn btn-success">Create Product</a>
                </div>
            @endcan
        </div>
    </div>
@endsection
