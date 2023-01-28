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
    

@endsection('content')