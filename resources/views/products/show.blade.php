@extends('layouts.app')

@section('content')
    <div class="container show-product">
        <h1>Product Details</h1>
        <div class="mt-5">
            <h3>Name: {{ $product->name }}</h3>
            <h3>Description: {{ $product->description }}</h3>
            <h3>Price: ${{ $product->price }}</h3>
            @if ($product->expiration_date)
                <h3>Expiration Date: {{ $product->expiration_date }}</h3>
            @endif
            <h3>Provider: {{ $product->provider->name }}</h3>
            <h3>Shops:</h3>
            <ul class="list-group">
                @foreach ($product->shops as $shop)
                    <a href="{{ route('shops.show', $shop) }}" class="list-group-item list-group-item-action">{{ $shop->name }}</a>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
