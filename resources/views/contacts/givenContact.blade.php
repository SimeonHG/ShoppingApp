@extends('layouts.app')
@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="pt-15 text-center">
            <h1 class="my-5 text-6xl font-bold">
                Contract by First and Last Name
            </h1>
        </div>
    </div>

    <div class="w-4/5 mx-auto py-6">
        <form action="/contacts/getGivenContact" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="text" name="fname" placeholder="First Name"
                    class="bg-transparent block border-b-2 w-full h-20 text-4xl outline-none">

                <input type="text" name="lname" placeholder="Last Name"
                    class="bg-transparent block border-b-2 w-full h-20 text-4xl outline-none">

                <button 
                    type="submit"
                    class="uppercase mt-5 bg-blue-900 text-white text-lg font-extrabold py-4 px-8 rounded-3xl">
                    Search
                </button>
        </form>
    </div>

    @foreach ($contacts as $contact)
    <div class="flex flex-col w-4/5 mx-auto py-5 border-b border-gray-200"> 
        <div class="flex">
            <h2 class="text-gray-700 font-bold text-5xl mr-3">
                {{ $contact->fname }}
            </h2>
            <h2 class="text-gray-700 font-bold text-5xl">
                {{ $contact->lname }}
            </h2>
        </div>

        <a 
            href="/contacts/{{ $contact->id }}" 
            class="uppercase w-1/5 text-center mt-15 bg-blue-900 text-white text-lg font-extrabold py-4 px-8 rounded-3xl"
        >
            Show More
        </a>
    </div>
    @endforeach
@endsection('content')