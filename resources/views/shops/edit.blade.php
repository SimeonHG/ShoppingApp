<!-- shops/edit.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Edit Shop</h1>

<form method="POST" action="{{ route('shops.update', $shop) }}">
    @csrf
    @method('PUT')

    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="{{ $shop->name }}">

    <label for="address">Address:</label>
    <input type="text" name="address" id="address" value="{{ $shop->address }}">

    <button type="submit">Update</button>
</form>
@endsection