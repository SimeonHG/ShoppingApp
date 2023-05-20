@extends('layouts.app')
@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="pt-15 text-left">
            <h1 class="my-5 text-6xl font-bold">
                Update card
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
        <form action="/cards/{{$card->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="text" name="number" placeholder="Number"
                    value="{{ $card->number }}"
                    class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">

                <input type="text" name="bankName" placeholder="Bank Name"
                    value="{{ $card->bankName }}"
                    class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">
                
                <input type="text" name="secCode" placeholder="Security Code"
                    value="{{ $card->secCode }}"
                    class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">

                <button 
                    type="submit"
                    class="uppercase mt-15 bg-blue-900 text-white text-lg font-extrabold py-4 px-8 rounded-3xl">
                    Update card
                </button>
        </form>
    </div>    
@endsection('content')
