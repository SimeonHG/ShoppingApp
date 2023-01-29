@extends('layouts.app')

@section('content')
<div class="h-screen w-full">
    <div class="background-image grid grid-cols-1 m-auto h-full w-full">
        <div class="flex text-gray-100">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-left">
                <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                    Address Book
                </h1>
                @if (Auth::check())
                <div>
                    <a href="/contacts" class="text-center rounded-lg bg-white text-black p-4 mr-14 font-bold text-xl uppercase">
                        Contacts    
                    </a>
                    <a href="/labels" class="text-center rounded-lg bg-white text-black p-4 mr-14 font-bold text-xl uppercase">
                        Labels    
                    </a>
                    <a href="/requests" class="text-center rounded-lg bg-white text-black p-4 px-4 font-bold text-xl uppercase">
                        Requests    
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection