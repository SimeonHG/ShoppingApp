@extends('layouts.app')
@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="pt-15 border-b border-gray-200">
            <h1 class="my-5 text-6xl font-bold">
                Card
            </h1>
        </div>
    </div>

    <div class="flex flex-col w-4/5 mx-auto py-12 border-b border-gray-200"> 
        <div class="flex">
            <h2 class="text-gray-700 font-bold text-5xl pb-4 mr-3">
                {{ $card->number }}
            </h2>
            <h2 class="text-gray-700 font-bold text-5xl pb-4">
                {{ $card->bankName }}
            </h2>
        </div>
        <div class="flex w-full justify-between mt-3">
            <span class="text-gray-700">
                Firm: <span class="font-bold">{{ $card->secCode }}</span>
            </span>
        </div>
        <div>
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
@endsection('content')