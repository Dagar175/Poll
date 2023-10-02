@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col justify-start bg-gray-50">
    <div class="flex place-content-center sm:fixed sm:top-0 sm:right-24 p-6 top-0 text-right z-10">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/poll') }}" class="-mt-2 font-semibold text-gray-600 no-underline hover:text-gray-800">Home</a>
            @else
                <a href="{{ route('login') }}" class="-mt-2 font-semibold text-gray-600 no-underline hover:text-gray-800">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class=" -mt-2 ml-4 font-semibold no-underline text-gray-600 hover:text-gray-800">Register</a>
                @endif
            @endauth
        @endif
    </div>

    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-gray-800 sm:text-4xl">
                 Polling Application
            </h2>
            <p class="mt-2 text-lg text-gray-600 sm:text-3xl">
                Cast your vote and make your voice heard!
            </p>
        </div>

        <div class="mt-8 bg-white py-8 px-4 text-center text-2xl font-bold shadow-lg sm:rounded-lg sm:px-10">
                    Vote is Power
        </div>
    </div>
</div>
@endsection
