@extends('layouts.app')
@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="pt-15 border-b border-gray-200">
            <h1 class="my-5 text-6xl font-bold">
                Labels
            </h1>
        </div>
    </div>

    @if (Auth::check())
        <div class="pt-15 w-4/5 m-auto">
            <a href="" class=" bg-blue-900 uppercase bg-transparent text-white text-lg font-extrabold py-4 px-7 rounded-3xl">
                Create Label
            </a>
        </div>
    @endif

    @foreach ($labels as $label)
        <div class="w-4/5 mx-auto py-15 border-b border-gray-200">
            <div class="flex justify-between"> 
                <h2 class="text-gray-700 font-bold text-5xl pb-4">
                    {{ $label->name }}
                </h2>
                <div class="ml-20 w-2/4 h-24 text-transparent rounded-3xl" style="background: {{ $label->color }}">
                    {{ $label->color }}
                </div>
            </div>
            <div class="pt-10">
                @if (isset(Auth::user()->id) && Auth::user()->id)
                    <span class="float-right">
                        <form action=""
                            method="POST">
                            @csrf
                            @method('delete')
                            <button class="text-red-500 pl-3" type="submit">
                                Delete
                            </button>
                        </form>
                    </span>
                    <span class="float-right">
                        <a href="" class="uppercase bg-blue-900 text-white text-md font-extrabold py-3 px-8 rounded-3xl">
                            Edit
                        </a>
                    </span>        
                @endif
            </div>
        </div>
    @endforeach

@endsection('content')