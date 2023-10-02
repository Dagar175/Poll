@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-6">List of Available Polls</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($polls as $poll)
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h2 class="text-xl font-semibold mb-2">{{ $poll->title }}</h2>
                    <p class="text-gray-600 mb-4">{{ $poll->description }}</p>
                    <div class="flex justify-between items-center">
                        <a href="{{ route('poll.show', ['poll' => $poll->id]) }}" class="text-blue-500 no-underline hover:underline">View Poll</a>
                        @if (auth()->user()->getVotedPolls()->contains('poll_id', $poll->id))
                            <span class="text-green-500">Voted</span>
                        @else
                            <span class="text-red-500">Not Voted Yet</span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
