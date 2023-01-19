@extends('layouts.app')
@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl">
                Contacts
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
            <a href="/contacts/create" class=" bg-green-400 uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
                Create Contact
            </a>
        </div>
    @endif

    @foreach ($contacts as $contact)
    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200"> 
        <div>
            <h2 class="text-gray-700 font-bold text-5xl pb-4">
                {{ $contact->fname }}
            </h2>
            <h2 class="text-gray-700 font-bold text-5xl pb-4">
                {{ $contact->lname }}
            </h2>
            <span class="text-gray-700">
                {{ $contact->firmName }}
            </span>
            <span class="text-gray-700">
                {{ $contact->adress }}
            </span>
            <span class="text-gray-700">
                {{ $contact->phoneNumber }}
            </span>
            <span class="text-gray-700">
                {{ $contact->mobileNumber }}
            </span>
            <span class="text-gray-700">
                {{ $contact->email }}
            </span>
            <span class="text-gray-700">
                {{ $contact->fax }}
            </span>


            <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light lin">
                {{ substr($contact->comment,0, 250) }} ...
            </p>

            <a href="/contacts/{{ $contact->id }}" class="uppercase bg-green-400 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                Keep Reading
            </a>
            @if (isset(Auth::user()->id) && Auth::user()->id == $contact->user_id)
                <span class="float-right">
                    <form action="/contacts/{{$contact->id}}"
                        method="POST">
                        @csrf
                        @method('delete')
                        <button class="text-red-500 pl-3" type="submit">
                            Delete
                        </button>
                    </form>
                </span>    
                <span class="float-right">
                        <a href="/contacts/{{ $contact->id }}/edit" class="uppercase italic bg-green-400 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                            Edit
                        </a>
                    </span>
                    
            @endif
        </div>
    </div>
    @endforeach

@endsection('content')