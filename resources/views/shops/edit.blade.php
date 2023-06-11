<!-- shops/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container edit-shop">
        <h1 class="mb-5">Edit Shop</h1>

        <div class="row">
            <div class="col">
                <form method="POST" action="{{ route('shops.update', $shop) }}">
                    @csrf
                    @method('PUT')
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                    <div>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $shop->name) }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                    <div>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $shop->address) }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-success">
                            Update
                        </button>
                    </div>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection