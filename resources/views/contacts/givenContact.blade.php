@extends('layouts.app')
@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl">
                Given Contact first name and last name
            </h1>
        </div>
    </div>

    <div class="w-4/5 m-auto">
        <form action="/contacts/getGivenContact" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="text" name="fname" placeholder="First Name"
                    class="bg-transparent block border-b-2 w-full h-20 text-4xl outline-none">

                <input type="text" name="lname" placeholder="Last Name"
                    class="bg-transparent block border-b-2 w-full h-20 text-4xl outline-none">

                <button 
                    type="submit"
                    class="uppercase mt-15 bg-green-400 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                    Search
                </button>
        </form>
    </div>

    @foreach ($contacts as $contact)
    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200"> 
        <div>
            <h2 class="text-gray-700 font-bold text-5xl pb-4">
                {{ $contact->fname }}
            </h2>
            <h2 class="text-gray-700 font-bold text-5xl pb-10">
                {{ $contact->lname }}
            </h2>

            <a href="/contacts/{{ $contact->id }}" class="uppercase bg-green-400 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                Keep Reading
            </a>
        </div>
    </div>
    @endforeach
@endsection('content')