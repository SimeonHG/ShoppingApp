@extends('layouts.app')
@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="pt-15 border-b border-gray-200">
            <h1 class="my-5 text-6xl font-bold">
                Cards
            </h1>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="w-4/5 m-auto mt-10 pl-2 text-center">
            <p class="w-1/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4">
                {{ session()->get('message') }}
            </p>
        </div>
    @endif

    @if (Auth::check())
        <div class="pt-15 w-4/5 m-auto">
            <a href="/cards/create" class=" bg-blue-900 uppercase bg-transparent text-white text-lg font-extrabold py-4 px-7 rounded-3xl">
                Create Card
            </a>
        </div>
    @endif

    @foreach ($cards as $card)
    <div class="flex flex-col w-4/5 mx-auto py-12 border-b border-gray-200"> 
        <div class="flex">
            <h2 class="text-gray-700 font-bold text-5xl pb-4 mr-3">
                {{ $card->number }}
            </h2>
            <h2 class="text-gray-700 font-bold text-5xl pb-4">
                {{ $card->bankName }}
            </h2>
        </div>
    

        <div class="pt-10">
            <a href="/cards/{{ $card->id }}" class="uppercase bg-blue-900 text-white text-md font-extrabold py-3 px-5 rounded-3xl">
                Show More
            </a>
            @if (isset(Auth::user()->id) && Auth::user()->id == $card->user_id)
                <span class="float-right">
                    <form action="/cards/{{$card->id}}"
                        method="POST">
                        @csrf
                        @method('delete')
                        <button class="text-red-500 pl-3" type="submit">
                            Delete
                        </button>
                    </form>
                </span>    
                <span class="float-right">
                    <a href="/cards/{{ $card->id }}/edit" class="uppercase bg-blue-900 text-white text-md font-extrabold py-3 px-8 rounded-3xl">
                        Edit
                    </a>
                </span>        
            @endif
        </div>
    </div>
    @endforeach

@endsection('content')