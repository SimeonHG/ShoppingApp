@extends('layouts.app')

@section('content')
    <div class="container cart">
        <h1 class="mb-5">Shopping Cart</h1>

        <div class="row">
            <div class="col">
            <h3>Products In Cart:</h3>
            @if ($boughtProducts->isEmpty())
                <p>No products in the cart.</p>
            @else
                <ul class="list-group">
                    @foreach ($boughtProducts as $product)
                        <li class="list-group-item">{{ $product->name }} - ${{ $product->price }}</li>
                    @endforeach
                </ul>

                @php
                    $collection = collect($boughtProducts);

                    $total = $collection->sum('price');
                @endphp

                <div class="mt-3">
                    <h5>Total: ${{ $total }}</h5>
                </div>

                <form class="mt-3" method="POST" action="{{ route('products.finish') }}">
                    @csrf
                    <label for="bank_account">Choose Bank Account To Fulfill Order:</label><br>
                    <select class="form-select pt-0 pb-0" name="bank_account" id="bank_account">
                        @foreach ($banks as $bank)
                        <option value="{{ $bank->id }}">{{ $bank->bank_name }} - {{ $bank->bank_account_number }}</option>
                        @endforeach
                    </select>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-success">
                            Finish Order
                        </button>
                    </div>
                </form>
            @endif
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
