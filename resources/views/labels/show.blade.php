@extends('layouts.app')
@section('content')
    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200"> 
        <div class="w-4/5 m-auto text-center">
            <div class="py-15 text-center flex">
                <h1 class="text-6xl">
                    {{$label->name}}
                </h1>
                <div class="ml-20 w-2/4 h-24 text-transparent" style="background: {{ $label->color }}">
                    {{ $label->color }}
                </div>
            </div>
        </div>
    </div>
@endsection('content')