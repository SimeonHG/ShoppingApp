@extends('layouts.app')
@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="pt-15 text-left">
            <h1 class="my-5 text-6xl font-bold">
                Update contact
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
        <form action="/contacts/{{$contact->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="text" name="fname" placeholder="First Name"
                    value="{{ $contact->fname }}"
                    class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">

                <input type="text" name="lname" placeholder="Last Name"
                    value="{{ $contact->lname }}"
                    class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">
                
                <input type="text" name="firmName" placeholder="Firm"
                    value="{{ $contact->firmName }}"
                    class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">

                <input type="text" name="adress" placeholder="Address"
                    value="{{ $contact->adress }}"
                    class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">

                <input type="text" name="phoneNumber" placeholder="phoneNumber"
                    value="{{ $contact->phoneNumber }}"
                    class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">

                <input type="text" name="mobileNumber" placeholder="mobileNumber"
                    value="{{ $contact->mobileNumber }}"
                    class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">

                <input type="text" name="email" placeholder="Email"
                    value="{{ $contact->email }}"
                    class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">

                <input type="text" name="fax" placeholder="fax"
                    value="{{ $contact->fax }}"
                    class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">

                <textarea name="comment" placeholder="Comment"
                    value="{{ $contact->comment }}"
                    class="py-5 bg-transparent block border-b-2 w-full text-2xl"></textarea> 


                <button 
                    type="submit"
                    class="uppercase mt-15 bg-blue-900 text-white text-lg font-extrabold py-4 px-8 rounded-3xl">
                    Update Contact
                </button>
        </form>
    </div>    
@endsection('content')