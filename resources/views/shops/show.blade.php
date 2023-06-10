@extends('layouts.app')

@section('content')
    <h1>{{ $shop->name }}</h1>
    
    <h2>Address: {{ $shop->address }}</h2>

    <h2>Products</h2>

    @if ($shop->products->isEmpty())
        <p>No products available.</p>
    @else
        <ul>
            @foreach ($shop->products as $product)
                <li>
                    {{ $product->name }} - {{ $product->price }}
                    <form method="POST" action="{{ route('products.buy', $product) }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">Buy</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('shops.index') }}">Back to all shops</a>
@endsection
