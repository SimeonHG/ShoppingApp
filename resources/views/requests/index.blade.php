@extends('layouts.app')
@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="pt-15 text-left">
            <h1 class="my-5 text-6xl font-bold">
                Requests
            </h1>
        </div>
    </div>
    <div class="w-4/5 mx-auto">
        <button type="button" onclick="window.location='{{ url("contacts") }}'">All Contacts</button>
        <button type="button" onclick="window.location='{{ url("contacts/popular") }}'">Contact with the most used label</button>
        <button type="button" onclick="window.location='{{ url("contacts/sameFirstName") }}'">Contacts with same first name</button>
        <button type="button" onclick="window.location='{{ url("contacts/sameLastName") }}'">Contacts with same last name</button>
        <button type="button" onclick="window.location='{{ url("contacts/givenContact") }}'">Contact with given names</button>
    </div>
@endsection('content')