@extends('layouts.app')
@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="py-15 text-left">
            <h1 class="text-6xl">
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

    <div class="w-4/5 m-auto pt-20">
    <form action="/contacts/{{$contact->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="text" name="fname" placeholder="First Name"
                    class="bg-transparent block border-b-2 w-full h-20 text-4xl outline-none">

                <input type="text" name="lname" placeholder="Last Name"
                    class="bg-transparent block border-b-2 w-full h-20 text-4xl outline-none">
                
                <input type="text" name="firmName" placeholder="Firm"
                    class="bg-transparent block border-b-2 w-full h-20 text-4xl outline-none">

                <input type="text" name="adress" placeholder="Adress"
                    class="bg-transparent block border-b-2 w-full h-20 text-4xl outline-none">

                <input type="text" name="phoneNumber" placeholder="phoneNumber"
                    class="bg-transparent block border-b-2 w-full h-20 text-4xl outline-none">

                <input type="text" name="mobileNumber" placeholder="mobileNumber"
                    class="bg-transparent block border-b-2 w-full h-20 text-4xl outline-none">

                <input type="text" name="email" placeholder="Email"
                    class="bg-transparent block border-b-2 w-full h-20 text-4xl outline-none">

                <input type="text" name="fax" placeholder="fax"
                    class="bg-transparent block border-b-2 w-full h-20 text-4xl outline-none">

                <textarea name="comment" placeholder="Comment"
                    class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl"></textarea> 


                <button 
                    type="submit"
                    class="uppercase mt-15 bg-green-400 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                    Create Contact
                </button>
        </form>
    </div>
    

@endsection('content')