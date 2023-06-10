@extends('layouts.app')

@section('content')
    <h1>Cart</h1>

    <h2>Products:</h2>
    @if ($boughtProducts->isEmpty())
        <p>No products in the cart.</p>
    @else
        <ul>
            @foreach ($boughtProducts as $product)
                <li>{{ $product->name }} - {{ $product->price }}</li>
            @endforeach
        </ul>

        <form method="POST" action="{{ route('products.finish') }}">
            @csrf
            <label for="bank_account">Choose Bank Account:</label><br>
            <select name="bank_account" id="bank_account">
                @foreach ($banks as $bank)
                <option value="{{ $bank->id }}">{{ $bank->bank_name }} - {{ $bank->bank_account_number }}</option>
                @endforeach
            </select>
            <button type="submit">Finish Order</button>
        </form>
    @endif

    <a href="{{ route('shops.index') }}">Back to all shops</a>
@endsection
