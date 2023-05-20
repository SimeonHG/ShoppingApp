@extends('layouts.app')
@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="pt-15 text-left">
            <h1 class="my-5 text-6xl font-bold">
                Create a card
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
        <form action="/cards" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="text" name="number" placeholder="Card number"
                    class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">

                <input type="text" name="bankName" placeholder="Bank name"
                    class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">
                
                <input type="text" name="secCode" placeholder="Security code"
                    class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">

                <button 
                    type="submit"
                    class="uppercase mt-15 bg-blue-900 text-white text-lg font-extrabold py-4 px-8 rounded-3xl">
                    Submit card
                </button>
        </form>
    </div>
    

@endsection('content')