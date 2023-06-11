<!-- shops/index.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Shops</h1>
@can('manage_shops')
<a href="{{ route('shops.create') }}">Create New Shop</a>
@endcan
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($shops as $shop)
        <tr>
            <td>{{ $shop->name }}</td>
            <td>{{ $shop->address }}</td>
            <td>
                <a href="{{ route('shops.show', $shop) }}">View</a>
                @can('manage_shops')
                <a href="{{ route('shops.edit', $shop) }}">Edit</a>
                @endcan
                <form action="{{ route('shops.destroy', $shop) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    @can('manage_shops')
                    <button type="submit">Delete</button>
                    @endcan
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection