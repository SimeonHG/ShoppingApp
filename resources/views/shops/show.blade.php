@extends('layouts.app')

@section('content')
    <div class="container show-shop">
        <h1 class="mb-5">Shop Details</h1>

         <div class="row">
            <div class="col">
                <h3>Name: {{ $shop->name }}</h3>
                <h3>Address: {{ $shop->address }}</h3>

                <h3>Products:</h3>
                @if ($shop->products->isEmpty())
                    <h4>No products available.</h4>
                @else
                    <ul class="list-group">
                        @foreach ($shop->products as $product)
                            <li class="list-group-item d-flex justify-content-between">
                                <h5>
                                    {{ $product->name }} - ${{ $product->price }}
                                </h5>
                                <form method="POST" action="{{ route('products.buy', $product) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Buy</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                @endif

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('shops.index') }}" class="btn btn-info">Back to all shops</a>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
