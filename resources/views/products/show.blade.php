@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $product->name }}</h1>
        <p>{{ $product->description }}</p>
        <p>Price: ${{ $product->price }}</p>
        @if ($product->expiration_date)
            <p>Expiration Date: {{ $product->expiration_date }}</p>
        @endif
        <p>Provider: {{ $product->provider->name }}</p>
        <p>Shops:</p>
        <ul>
            @foreach ($product->shops as $shop)
                <li>{{ $shop->name }}</li>
            @endforeach
        </ul>
    </div>
@endsection
