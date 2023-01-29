@extends('layouts.app')
@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="pt-15 text-center">
            <h1 class="my-5 text-6xl font-bold">
                Requests
            </h1>
        </div>
    </div>
    <div class="flex flex-col items-center justify-center w-full mt-15">
        <button 
            type="button" 
            class="uppercase w-1/3 bg-blue-900 text-white text-lg font-extrabold py-4 px-8 rounded-3xl" 
            onclick="window.location='{{ url("contacts") }}'"
        >
            All Contacts
        </button>
        <button 
            type="button"
            class="uppercase w-1/3 mt-10 bg-blue-900 text-white text-lg font-extrabold py-4 px-8 rounded-3xl" 
            onclick="window.location='{{ url("contacts/popular") }}'"
        >
            Contact with the most used label
        </button>
        <button 
            type="button"
            class="uppercase w-1/3 mt-10 bg-blue-900 text-white text-lg font-extrabold py-4 px-8 rounded-3xl" 
            onclick="window.location='{{ url("contacts/sameFirstName") }}'"
        >
            Contacts with same first name
        </button>
        <button 
            type="button"
            class="uppercase w-1/3 mt-10 bg-blue-900 text-white text-lg font-extrabold py-4 px-8 rounded-3xl" 
            onclick="window.location='{{ url("contacts/sameLastName") }}'"
        >
            Contacts with same last name
        </button>
        <button
            type="button"
            class="uppercase w-1/3 mt-10 bg-blue-900 text-white text-lg font-extrabold py-4 px-8 rounded-3xl" 
            onclick="window.location='{{ url("contacts/givenContact") }}'"
        >
            Contact with given names
        </button>
    </div>
@endsection('content')