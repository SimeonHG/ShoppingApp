<!-- shops/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container shops">
        <h1 class="mb-5">Shops</h1>
    
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($shops as $shop)
                <tr>
                    <td>{{ $shop->name }}</td>
                    <td>{{ $shop->address }}</td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('shops.show', $shop) }}" class="btn btn-primary button">View</a>
                            @can('manage_shops')
                                <a href="{{ route('shops.edit', $shop) }}" class="btn btn-secondary button">Edit</a>
                            @endcan
                            @can('manage_shops')
                                <form action="{{ route('shops.destroy', $shop) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger button">Delete</button>
                                </form>
                            @endcan
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @can('manage_products')
            <div class="footer_buttons">
                <a href="{{ route('shops.create') }}" class="btn btn-success">Create New Shop</a>
            </div>
        @endcan
    </div>
@endsection