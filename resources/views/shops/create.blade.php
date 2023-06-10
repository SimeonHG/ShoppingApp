<!-- shops/create.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Create Shop</h1>

<form method="POST" action="{{ route('shops.store') }}">
    @csrf

    <label for="name">Name:</label>
    <input type="text" name="name" id="name">

    <label for="address">Address:</label>
    <input type="text" name="address" id="address">

    <button type="submit">Create</button>
</form>
@endsection