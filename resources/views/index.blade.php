@extends('layouts.app')

@section('content')
    <div class="background-image grid grid-cols-1 m-auto">
        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-left">
                <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                    how far does the rabbit hole go?
                </h1>
                <a href="/blog" class="text-center bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase">
                    Read more    
                </a>
                @if (Auth::check())
                    <a href="/contacts" class="text-center bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase">
                        Contacts    
                    </a>
                @endif
            </div>
        </div>
    </div>
    <div class="sm:grid grid-cols-2 gap-20 w-/5 mx-aut py-15 border-b border-gray-200">
        <div class="pl-32">
            <img src="https://cdn.pixabay.com/photo/2010/12/13/10/05/berries-2277_960_720.jpg" width="500" alt="">
        </div>

        <div class="m-auto sm:m-auto text-left w-4/5 block">
            <h2 class="text-4xl font-extrabold text-gray-600">
                Top Post: Are berries plotting to kill your family
            </h2>

            <p class="py-8 text-gray-500 text-l">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio magni tempora reiciendis eaque tenetur in hic earum, velit soluta provident dolor voluptas fuga eos quisquam commodi incidunt quos! Architecto, laboriosam.
            </p>

            <p class="font-extrabold text-gray-500 text-l pb-9">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio magni tempora reiciendis eaque tenetur in hic earum, velit soluta provident dolor voluptas fuga eos quisquam commodi incidunt quos! Architecto, laboriosam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga nihil, odio mollitia dicta unde error corporis rem, porro aliquam atque, neque maiores excepturi soluta reiciendis tenetur quisquam. Cum, inventore quia.
            </p>

            <a href="/blog" class="uppercase bg-green-400 text-gray-100 text-s font-extrabold py-3 px-8 rounded-3xl">
                Find out more
            </a>
        </div>
    </div>

    <div class="text-center p-15 bg-black text-white">
        <h2 class="text-2xl pb-5 text-l">
            Your one stop shop for everything:
        </h2>

        <span class="font-extrabold block text-4xl py-1">
            Tech
        </span>
        <span class="font-extrabold block text-4xl py-1">
            Culture
        </span>
        <span class="font-extrabold block text-4xl py-1">
            Conspiracy Theories
        </span>
        <span class="font-extrabold block text-4xl py-1">
            Nbu stuff
        </span>
    </div>

@endsection