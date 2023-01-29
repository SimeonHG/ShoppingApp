@extends('layouts.app')
@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="pt-15 text-center">
            <h1 class="my-5 text-6xl font-bold">
                Update User
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
    <form action="/users/{{ Auth::user()->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="text" name="email" placeholder="Email" value="{{ Auth::user()->email }}"
                    class="bg-transparent block border-b-2 w-full h-20 text-4xl outline-none" required>

                <input type="text" name="fname" placeholder="First Name" value="{{ Auth::user()->fname }}"
                    class="bg-transparent block border-b-2 w-full h-20 text-4xl outline-none" required>

                <input type="text" name="lname" placeholder="Last Name" value="{{ Auth::user()->lname }}"
                    class="bg-transparent block border-b-2 w-full h-20 text-4xl outline-none" required>
                
                <input type="text" name="age" placeholder="Age" value="{{ Auth::user()->age }}"
                    class="bg-transparent block border-b-2 w-full h-20 text-4xl outline-none" required>

                <input type="text" name="address" placeholder="Address" value="{{ Auth::user()->address }}"
                    class="bg-transparent block border-b-2 w-full h-20 text-4xl outline-none" required>

                <input type="text" name="gender" placeholder="gender" value="{{ Auth::user()->gender }}"
                    class="bg-transparent block border-b-2 w-full h-20 text-4xl outline-none" required>

                <button 
                    type="submit"
                    class="uppercase mt-5 bg-blue-900 text-white text-lg font-extrabold py-4 px-8 rounded-3xl">
                    Apply
                </button>
        </form>
    </div>
    

@endsection('content')