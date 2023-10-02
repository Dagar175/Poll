@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-4 rounded-md shadow-md">
    <h2 class="text-3xl font-semibold mb-6 text-center">Poll Results</h2>
    <h3 class="text-xl font-semibold mb-4">{{ $poll->title }}</h3>
    <p class="text-gray-600 mb-6">{{ $poll->description }}</p>

    <div class="border-t border-gray-300 pt-4">
        <ul>
            @foreach ($poll->options as $option)
            <li class="flex items-center justify-between py-2 px-4">
                <span class="text-lg">{{ $option->content }}</span>
                <span class="text-green-600 font-semibold">{{ $option->votes_count }} votes</span>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="mt-6 text-center">
        <a href="{{ route('poll.show', $poll) }}" class="bg-blue-500 hover:bg-blue-700 no-underline text-white font-semibold py-2 px-4 rounded-lg mr-2">Change Vote</a>
        <a href="{{ route('home') }}" class="bg-gray-500 hover:bg-gray-700 no-underline text-white font-semibold py-2 px-4 rounded-lg">Back to Home</a>
    </div>
</div>
@endsection
