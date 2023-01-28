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
            
            @if (isset(Auth::user()->id) && Auth::user()->id == $contact->user_id)  
            
                <form action="/labels/{{$label->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="text" name="name" value="{{$label->name}}" style="color:white; background-color: {{ $label->color }}; width: 100px; height: 50px;border: 1px solid black;">
                    <input type="color" name="color" value="{{ $label->color }}">
                    <input type="hidden" name="contact_id" value="{{$label->contact_id}}">
                    <div>
                    <button type="submit"> 
                        Save
                    </button>
                    </div>
                </form>
                <form action="/labels/{{$label->id}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit">
                        Delete
                    </button>
                </form>
            @endif
        @endforeach
        
    </div>


    <div class="w-4/5 m-auto pt-20">
        <form action="/labels" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="text" name="name" placeholder="Name" required>

                <input type="color" name="color" value="#e66465">

                <input type="hidden" name="contact_id" value="{{$contact->id}}">

                <button type="submit">
                    Submit
                </button>
        </form>
    </div>
    

@endsection('content')