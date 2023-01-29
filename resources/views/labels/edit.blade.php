@extends('layouts.app')
@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="pt-15 text-left">
            <h1 class="my-5 text-6xl font-bold">
                Edit a Label
            </h1>
        </div>
    </div>

    @if ($errors->any())
        <div class="w-4/5 m-auto">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4">
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="w-4/5 mx-auto">
            <form action="/labels/{{$label->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <input type="text" name="name" placeholder="Name" value="{{$label->name}}" required>

                <input type="color" name="color" value="{{$label->color}}">

                <button type="submit">
                    Submit
                </button>
        </form>
    </div>
    

@endsection('content')