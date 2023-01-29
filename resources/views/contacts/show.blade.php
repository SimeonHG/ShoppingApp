@extends('layouts.app')
@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="pt-15 border-b border-gray-200">
            <h1 class="my-5 text-6xl font-bold">
                Contact
            </h1>
        </div>
    </div>

    <div class="flex flex-col w-4/5 mx-auto py-12 border-b border-gray-200"> 
        <div class="flex">
            <h2 class="text-gray-700 font-bold text-5xl pb-4 mr-3">
                {{ $contact->fname }}
            </h2>
            <h2 class="text-gray-700 font-bold text-5xl pb-4">
                {{ $contact->lname }}
            </h2>
        </div>
        <div class="flex w-full justify-between mt-3">
            <span class="text-gray-700">
                Firm: <span class="font-bold">{{ $contact->firmName }}</span>
            </span>
            <span class="text-gray-700">
                Address: <span class="font-bold">{{ $contact->adress }}</span>
            </span>
            <span class="text-gray-700">
                Phone Number: <span class="font-bold">{{ $contact->phoneNumber }}</span>
            </span>
            <span class="text-gray-700">
                Mobile Number: <span class="font-bold">{{ $contact->mobileNumber }}</span>
            </span>
        </div>
        <div class="flex w-full justify-between mt-5">
            <span class="text-gray-700">
                Email: <span class="font-bold">{{ $contact->email }}</span>
            </span>
            <span class="text-gray-700">
                Mobile Number: <span class="font-bold">{{ $contact->mobileNumber }}</span>
            </span>
            <span class="text-gray-700">
                Fax: <span class="font-bold">{{ $contact->fax }}</span>
            </span>
        </div>

        <div class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light lin">
            Comment:
            <span class="font-bold">
                {{ substr($contact->comment,0, 250) }}
            </span>       
        </div>
        <div>
            @if (isset(Auth::user()->id) && Auth::user()->id == $contact->user_id)
                <span class="float-right">
                    <form action="/contacts/{{$contact->id}}"
                        method="POST">
                        @csrf
                        @method('delete')
                        <button class="text-red-500 pl-3" type="submit">
                            Delete
                        </button>
                    </form>
                </span>    
                <span class="float-right">
                    <a href="/contacts/{{ $contact->id }}/edit" class="uppercase bg-blue-900 text-white text-md font-extrabold py-3 px-8 rounded-3xl">
                        Edit
                    </a>
                </span>        
            @endif
        </div>
    </div>

    <div class="w-4/5 m-auto pt-5">
        <div class="mb-3">
            <span class="font-bold">Attached labels:</span>
        </div>
        <div class="flex flex-col">
            @foreach($contact->labels as $label)
                @if (isset(Auth::user()->id) && Auth::user()->id == $contact->user_id)  
                <form action="/labels/{{ $label->id }}/detachContact" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="w-2/4 border-b border-gray-200">
                        <div class="flex justify-between">
                            <div class="flex w-3/4">
                                <h2 class="w-2/4 text-gray-700 font-bold text-3xl pb-4">
                                    {{ $label->name }}
                                </h2>
                                <div class="ml-5 w-2/4 h-10 text-transparent rounded-3xl" style="background: {{ $label->color }}">
                                    {{ $label->color }}
                                </div>
                            </div>
                            <input type="hidden" name="contact_id" value="{{ $contact->id }}">
                            <button type="submit"> 
                                Attach
                            </button>
                        </div>
                    </div>
                </form>
                @endif
            @endforeach
        </div>
    </div>

    <div class="w-4/5 m-auto pt-10">
        <div class="mb-3">
            <span class="font-bold">Unattached labels:</span>
        </div>
        <div class="flex flex-col">
            @foreach($labels as $label)
                @if (isset(Auth::user()->id) && Auth::user()->id == $contact->user_id)  
                    <form action="/labels/{{ $label->id }}/attachContact" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="w-2/4 border-b border-gray-200 pt-2">
                            <div class="flex justify-between">
                                <div class="flex w-3/4">
                                    <h2 class="w-2/4 text-gray-700 font-bold text-3xl pb-4">
                                        {{ $label->name }}
                                    </h2>
                                    <div class="ml-5 w-2/4 h-10 text-transparent rounded-3xl" style="background: {{ $label->color }}">
                                        {{ $label->color }}
                                    </div>
                                </div>
                                <input type="hidden" name="contact_id" value="{{ $contact->id }}">
                                <button type="submit"> 
                                    Attach
                                </button>
                            </div>
                        </div>
                    </form>
                @endif
            @endforeach
        </div>
    </div>
@endsection('content')