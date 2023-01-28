@extends('layouts.app')
@section('content')
    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200"> 
        <div class="w-4/5 m-auto text-center">
            <div class="py-15 text-center">
                <h1 class="text-6xl">
                    {{$contact->fname . " " . $contact->lname}}
                </h1>
            </div>
        </div>
    </div>


    <div class="w-4/5 m-auto pt-20">
        <p class="text-xl text-green-700 pt-8 pb-10 leading-8 font-light">
                {{$contact->comment}}
        </p>
    </div>


    <div class="w-4/5 m-auto pt-20">
        @foreach($contact->labels as $label)
            <span style="color:white; background-color: {{ $label->color }}; width: 200px; height: 100px;border: 1px solid black; padding:10px 16px;">
                {{$label->name}}
            </span>
        @endforeach
        
    </div>


    <div class="w-4/5 m-auto pt-20">
        <form action="/labels" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="text" name="name" placeholder="Name"
                    class="bg-transparent block border-b-2 w-full h-20 text-4xl outline-none" required>

                <input type="color" name="color" value="#e66465">

                <input type="hidden" name="contact_id" value="{{$contact->id}}">

                <button 
                    type="submit"
                    class="uppercase mt-15 bg-green-400 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                    Submit Label
                </button>
        </form>
    </div>
    

@endsection('content')