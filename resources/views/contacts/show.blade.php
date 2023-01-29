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


    <div class="w-4/5 m-auto pt-20">
        @foreach($labels as $label)
            
            @if (isset(Auth::user()->id) && Auth::user()->id == $contact->user_id)  
            
                <form action="/labels/{{ $label->id }}/attachContact" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <p name="name" style="color:white; background-color: {{ $label->color }}; width: 100px; height: 50px;border: 1px solid black;">{{$label->name}}</p>
                    <p name="color" value="{{ $label->color }}">
                    <input type="hidden" name="contact_id" value="{{ $contact->id }}">
                    <button type="submit"> 
                        Attach
                    </button>
                </form>
                <!-- <form action="/labels/{{$label->id}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit">
                        Delete
                    </button>
                </form> -->
            @endif
        @endforeach
        
    </div>

    <div class="w-4/5 m-auto pt-20">
        Added labels:
        @foreach($contact->labels as $label)

            @if (isset(Auth::user()->id) && Auth::user()->id == $contact->user_id)  
            
            <form action="/labels/{{ $label->id }}/detachContact" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <p name="name" style="color:white; background-color: {{ $label->color }}; width: 100px; height: 50px;border: 1px solid black;">{{$label->name}}</p>
                <p name="color" value="{{ $label->color }}">
                <input type="hidden" name="contact_id" value="{{ $contact->id }}">
                <button type="submit"> 
                    Detach
                </button>
            </form>
                <!-- <form action="/labels/{{$label->id}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit">
                        Delete
                    </button>
                </form> -->
            @endif
        @endforeach
        
    </div>
    

@endsection('content')